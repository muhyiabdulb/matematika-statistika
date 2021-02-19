@extends('layouts/admin')
@section('content')
<div class="main-content">
      <section class="section">
            <div class="section-header">
                  <h1>Dashboard / Statistika / Materi Statistika</h1>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            @endif

            <a href="{{ url('/admin/statistika') }}" class="btn btn-primary">KEMBALI</a>
            <br>
            <br>

            <div class="section-header">
                  <div class="col-12">
                        <form action="{{ route('materi.index') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                    <label style="color: black;" for="kode_soal" class="form-label">Kode Materi</label>
                                    <input type="text" name="kode_materi" class="form-control" id="kode_oal" required>
                              </div>
                              <div class="mb-3">
                                    <label style="color: black;" for="materi" class="form-label">Judul Materi</label>
                                    <input type="text" name="materi" class="form-control" id="materi" required>
                              </div>
                              <div class="mb-3">
                                    <label style="color: black;" for="" class="form-label">Materi</label>
                                    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" ></script>
                                    <textarea  name="sub_materi" class="form-control my-editor"></textarea>
                                    <script>
                                    var editor_config = {
                                    path_absolute : "/",
                                    selector: "textarea.my-editor",
                                    plugins: [
                                          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                                          "searchreplace wordcount visualblocks visualchars code fullscreen",
                                          "insertdatetime media nonbreaking save table contextmenu directionality",
                                          "emoticons template paste textcolor colorpicker textpattern"
                                    ],
                                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                                    relative_urls: false,
                                    file_browser_callback : function(field_name, url, type, win) {
                                          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                    
                                          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                                          if (type == 'image') {
                                          cmsURL = cmsURL + "&type=Images";
                                          } else {
                                          cmsURL = cmsURL + "&type=Files";
                                          }
                                    
                                          tinyMCE.activeEditor.windowManager.open({
                                          file : cmsURL,
                                          title : 'Filemanager',
                                          width : x * 0.8,
                                          height : y * 0.8,
                                          resizable : "yes",
                                          close_previous : "no"
                                          });
                                    }
                                    };
                                    
                                    tinymce.init(editor_config);
                                    </script>
                              </div>
                              <div class="mb-3">
                                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                              </div>
                        </form>
                  </div>
            </div>

            <h3>Materi Statistika</h3>
            <div class="section-header">
                  <table width="100%">
                        @foreach($materis as $materi)
                              <tr>
                                    <th height="21"><font color="#000000">&nbsp;</font></th>
                                    <th>{{ $materi->materi }}</th>
                              </tr>
                              <tr>
                                    <th height="21"><font color="#000000">&nbsp;</font></th>
                                    <td>{!! $materi->sub_materi !!}</td>
                              </tr>
                              <tr>
                                    <th height="21"><font color="#000000">&nbsp;</font></th>
                                    <th>
                                          <form action="{{ route('materi.delete', $materi->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                          </form>
                                    </th>
                                    <th>
                                          <a href="{{ route('materi.edit', $materi->id) }}" class="btn btn-warning">Edit</a>
                                    </th>
                              </tr>
                        @endforeach
                  </table>
            </div>
    </section>
</div>
@endsection