<?php 

    include_once '../model/Foto.php';
    
    if(isset($_POST['upload'])):
        
        
        $arquivosPermitidos = array("docx", "xls");
        $imagensPermitidas = array( "jpeg", "png", "gif");
        $extensao = end(explode(".", $_FILES['foto']['name']));
        
        if(in_array($extensao, $arquivosPermitidos)):
            $pasta = "../arquivo/";
        elseif (in_array($extensao, $imagensPermitidas)):
                $pasta = "../foto/";
        else:
                $erro = "Tipo de Arquivo não aceito";
        endif;
        
        if(!isset($erro)):
           $temporario = $_FILES['foto']['tmp_name'];
           $novoNome = uniqid().".{$extensao}";
           
           if(move_uploaded_file($temporario, $pasta.$novoNome)):
                $foto = new Foto();
            $foto->setNome(trim($_POST['nome']));
            $foto->setFoto($pasta.$novoNome);
             if($foto->cadastrar()):
                        $mensagem = $novoNome . "Cdastrado com sucesso";
                        else:
                            echo $foto->getErro();
                    endif;
                       
           else:
            $erro = "Erro ao fazer upload do arquivo";
        endif;
      endif;
   
  endif;
  
  $pega = new Foto();
  $mostra = $pega->listar();
  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nome">Nome:</label>
            <input type="nome" name="nome"/>
            <label for="upload">Upload:</label>
            <input type="file" name="foto"/>
            <input type="submit" name="upload" value="ok" />
        </form>
        <?php echo isset($erro) ? $erro: ' '; ?>
        <?php echo isset($mensagem) ? $mensagem: ' '; ?>
        
        <br>
        <br>
        <?php foreach ($mostra as $mos): 
            echo $mos["nome"]. "<br>";
            echo "<img src=".$mos['foto']." width=150 height=150 />";
            echo $mos["foto"]."<br>";
        endforeach;
        
         echo "<img src='../foto/56c24d06e9de7.png' width=150 height=150 />";
?>
    </body>
</html>
