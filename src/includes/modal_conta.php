<!-- Modal contendo o formulário de alteração dos dados cadastrais do usuário  --> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<div id="mdconta" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
  <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 1px solid #eaeaea; padding: 20px;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: 2px;">×</button>
    <h3 id="myModalLabel" style="margin: 0; color: #2c3e50; font-weight: 600; font-size: 20px; display: flex; align-items: center; gap: 8px;">
      <i class="icon-wrench" style="margin: 0; margin-top: -2px;"></i> Configurações da Conta
    </h3>
  </div>
  <div class="modal-body" style="padding: 25px; max-height: 50vh; overflow-y: auto;">

    <form action="/salvadadoscad.php" method="post" enctype="multipart/form-data" style="margin: 0;" id="formDadosCad">
      <input type="hidden" name="foto_base64" id="foto_base64" value="">

      <!-- Seção da Foto do Perfil -->
      <div style="display: flex; align-items: center; margin-bottom: 25px; padding-bottom: 20px; border-bottom: 1px solid #f0f0f0;">
          <div style="margin-right: 20px;">
              <img src="/fotos/<?php echo isset($imagem_side) ? $imagem_side : 'default.png'; ?>" id="avatar_preview" alt="Sua Foto" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #3498db; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
          </div>
          <div class="control-group" style="margin-bottom: 0;">
            <label class="control-label" for="filebutton" style="font-weight: 600; color: #34495e;">Trocar Foto de Perfil</label>
            <div class="controls">
              <input id="filebutton" name="foto" class="input-file" type="file" accept="image/*" style="font-size: 13px;">
              <p class="help-block" style="font-size: 11px; color: #95a5a6; margin-top: 5px;">Selecione uma imagem para recortar e enviar.</p>
            </div>
          </div>
      </div>

      <!-- Container do Cropper (Oculto inicialmente) -->
      <div id="cropper_container" style="display: none; margin-bottom: 20px; width: 100%; max-height: 300px; text-align: center;">
          <img id="image_to_crop" src="" style="max-width: 100%; display: block; margin: 0 auto;">
      </div>

      <!-- Dados do Usuário -->
      <div class="row-fluid">
          <div class="span6">
              <div class="control-group">
                <label class="control-label" for="textinput" style="font-weight: 600; color: #34495e;">Usuário</label>
                <div class="controls">
                  <input name="usuario" type="text" value="<?php echo $_SESSION['login'] ?>" class="span12" required="" style="border-radius: 6px; padding: 10px;">
                </div>
              </div>
          </div>
          <div class="span6">
              <div class="control-group">
                <label class="control-label" for="textinput" style="font-weight: 600; color: #34495e;">Nome Completo</label>
                <div class="controls">
                 <input name="nome" type="text" value="<?php echo $_SESSION['nome'] ?>" class="span12" required="" style="border-radius: 6px; padding: 10px;">
                 </div>
              </div>
          </div>
      </div>

      <div class="row-fluid">
          <div class="span6">
              <div class="control-group">
                <label class="control-label" for="textinput" style="font-weight: 600; color: #34495e;">E-mail</label>
                <div class="controls">
                <input name="email" type="email" value="<?php echo $_SESSION['email'] ?>" class="span12" required="" style="border-radius: 6px; padding: 10px;">
                </div>
              </div>
          </div>
          <div class="span6">
              <div class="control-group">
                <label class="control-label" for="textinput" style="font-weight: 600; color: #34495e;">Senha</label>
                <div class="controls">
                <input name="senha" type="password" value="<?php echo $_SESSION['senha'] ?>" class="span12" required="" style="border-radius: 6px; padding: 10px;">
                </div>
              </div>
          </div>
      </div>

  </div>
  <div class="modal-footer" style="background-color: #f8f9fa; border-top: 1px solid #eaeaea; padding: 15px 25px;">
    <button class="btn" data-dismiss="modal" aria-hidden="true" style="border-radius: 6px; padding: 8px 15px; font-weight: 600; color: #7f8c8d; border: 1px solid #bdc3c7;">Cancelar</button>
    <button type="submit" name="singlebutton" class="btn btn-primary" style="border-radius: 6px; padding: 8px 25px; font-weight: 600; box-shadow: 0 2px 5px rgba(0, 136, 204, 0.3);">Salvar Alterações</button>
  </div>
  </form>
</div>

<script>
    let cropper;
    const fileInput = document.getElementById('filebutton');
    const imageToCrop = document.getElementById('image_to_crop');
    const cropperContainer = document.getElementById('cropper_container');
    const formCad = document.getElementById('formDadosCad');
    const fotoBase64 = document.getElementById('foto_base64');

    fileInput.addEventListener('change', function(e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            const file = files[0];
            const reader = new FileReader();
            
            reader.onload = function(event) {
                imageToCrop.src = event.target.result;
                cropperContainer.style.display = 'block';
                
                if (cropper) {
                    cropper.destroy();
                }
                
                cropper = new Cropper(imageToCrop, {
                    aspectRatio: 1, // Força a ser quadrado perfeito
                    viewMode: 1,
                    autoCropArea: 1,
                    background: false
                });
            };
            reader.readAsDataURL(file);
        }
    });

    formCad.addEventListener('submit', function(e) {
        if (cropper) {
            e.preventDefault(); // Previne o envio padrão para podermos extrair a imagem
            const canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });
            // Gera base64
            fotoBase64.value = canvas.toDataURL('image/png');
            // Remove o arquivo pesado original do input pra não engasgar o servidor
            fileInput.value = '';
            // Dispara o envio real
            formCad.submit();
        }
    });
</script>
