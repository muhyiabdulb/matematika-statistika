@extends('layouts/admin')
@section('content')
<div class="main-content">
      <section class="section">
            <div class="section-header">
                  <h1>Dashboard / Statistika / Soal Latihan</h1>
            </div>

            <div class="section-header">
                  <div class="col-12">
                        <form action="{{ url('/admin/statistika/soal') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                    <label style="color: black;" for="kode_soal" class="form-label">Kode Soal</label>
                                    <input type="text" name="kode_soal" class="form-control" id="kode_soal" required>
                              </div>
                              
                              <div class="mb-3">
                                    <label style="color: black;" for="" class="form-label">Soal</label>
                                    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" ></script>
                                    <textarea  name="soal" class="form-control my-editor"></textarea>
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
                                    <label style="color: black;" for="" class="form-label">Pilihan A</label>
                                    <input class="form-control" name="pilihan_a" id="pilihan_a" required>
                              </div>
                              <div class="mb-3">
                                    <label style="color: black;" for="" class="form-label">Pilihan B</label>
                                    <input class="form-control" name="pilihan_b" id="pilihan_b" required>
                              </div>
                              <div class="mb-3">
                                    <label style="color: black;" for="" class="form-label">Pilihan C</label>
                                    <input class="form-control" name="pilihan_c" id="pilihan_c" required>
                              </div>
                              <div class="mb-3">
                                    <label style="color: black;" for="" class="form-label">Pilihan D</label>
                                    <input class="form-control" name="pilihan_d" id="pilihan_d" required>
                              </div>
                              <div class="mb-3">
                                    <label style="color: black;" for="" class="form-label">Pilihan E</label>
                                    <input class="form-control" name="pilihan_e" id="pilihan_e" required>
                              </div>
                              <div class="mb-3">
                                    <label style="color: black;" for="" class="form-label">Jawaban Benar</label>
                                    <input class="form-control" name="jawaban_benar" id="jawaban_benar" required>
                              </div>
                              <div class="mb-3">
                                    <button type="sumbit" class="btn btn-primary">SIMPAN</button>
                              </div>
                        </form>
                  </div>
            </div>
    </section>
</div>
@endsection