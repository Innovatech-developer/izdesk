<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Gerenciamento</title>
<script src="scripts/jquery.js"></script>
<script src="scripts/jquery.tablesorter.min.js"></script>
<script src="scripts/jquery.tablesorter.pager.js"></script>
<link rel="stylesheet" type="text/css" href="css/normalize.css">
<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<section id="content">
		<!-- BEGIN HEADER -->
		<header id="header-content"> </header>
		<!-- END HEADER -->

		<!-- BEGIN CONTENT -->
		<section id="content-page">
			<div id="pesquisar">
				<form action="#" method="post" id="busca">
					<form method="post" action="exemplo.html" id="frm-filtro">
						<p>
							<label for="pesquisar">Pesquisar:</label> <input type="text"
								id="pesquisar" name="pesquisar" size="30" /> <label for="por">Por:</label>
							<select name="pesquisaPor" id="por">
								<option>Cod. Cliente</option>
								<option>Solicitante</option>
								<option>Equipamento</option>
								<option>Modelo</option>
								<option>Série</option>
							</select>
							<button type="submit">Pesquisar</button>
						</p>
					</form>

					<table cellspacing="0" summary="Tabela de dados fictícios">
						<thead>
							<tr>
								<th><input type="checkbox" value="1" id="marcar-todos"
									name="marcar-todos" /></th>
								<th>Cod. Cliente</th>
								<th>Solicitante</th>
								<th>Equipamento</th>
								<th>Modelo</th>
								<th>Série</th>
								<tH>Editar</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" value="1" name="marcar[]" /></td>
								<td>1</td>
								<td>Suporte tecnico</td>
								<td>Impressora</td>
								<td>Brother</td>
								<td>21asdff4</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="2" name="marcar[]" /></td>
								<td>2</td>
								<td>SAC</td>
								<td>Scanner</td>
								<td>RICOH</td>
								<td>ras5522</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="3" name="marcar[]" /></td>
								<td>3</td>
								<td>Vendas</td>
								<td>Vendas</td>
								<td>Brother</td>
								<td>afs2121</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="1" name="marcar[]" /></td>
								<td>1</td>
								<td>Suporte tecnico</td>
								<td>Impressora</td>
								<td>Brother</td>
								<td>21asdff4</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="2" name="marcar[]" /></td>
								<td>2</td>
								<td>SAC</td>
								<td>Scanner</td>
								<td>RICOH</td>
								<td>ras5522</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="3" name="marcar[]" /></td>
								<td>3</td>
								<td>Vendas</td>
								<td>Vendas</td>
								<td>Brother</td>
								<td>afs2121</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="1" name="marcar[]" /></td>
								<td>1</td>
								<td>Suporte tecnico</td>
								<td>Impressora</td>
								<td>Brother</td>
								<td>21asdff4</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="2" name="marcar[]" /></td>
								<td>2</td>
								<td>SAC</td>
								<td>Scanner</td>
								<td>RICOH</td>
								<td>ras5522</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="3" name="marcar[]" /></td>
								<td>3</td>
								<td>Vendas</td>
								<td>Vendas</td>
								<td>Brother</td>
								<td>afs2121</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="1" name="marcar[]" /></td>
								<td>1</td>
								<td>Suporte tecnico</td>
								<td>Impressora</td>
								<td>Brother</td>
								<td>21asdff4</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="2" name="marcar[]" /></td>
								<td>2</td>
								<td>SAC</td>
								<td>Scanner</td>
								<td>RICOH</td>
								<td>ras5522</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="3" name="marcar[]" /></td>
								<td>3</td>
								<td>Vendas</td>
								<td>Vendas</td>
								<td>Brother</td>
								<td>afs2121</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="1" name="marcar[]" /></td>
								<td>1</td>
								<td>Suporte tecnico</td>
								<td>Impressora</td>
								<td>Brother</td>
								<td>21asdff4</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="2" name="marcar[]" /></td>
								<td>2</td>
								<td>SAC</td>
								<td>Scanner</td>
								<td>RICOH</td>
								<td>ras5522</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
							<tr>
								<td><input type="checkbox" value="3" name="marcar[]" /></td>
								<td>3</td>
								<td>Vendas</td>
								<td>Vendas</td>
								<td>Brother</td>
								<td>afs2121</td>
								<td><a href="#"><img src="imagens/edit.png" width="16"
										height="16" /></a> <a href="#"><img src="imagens/delete.png"
										width="16" height="16" /></a></td>
							</tr>
						</tbody>
					</table>

					<div id="pager" class="pager">
						<form>
							<span> Exibir <select class="pagesize">
									<option selected="selected" value="10">10</option>
									<option value="20">20</option>
									<option value="30">30</option>
									<option value="40">40</option>
							</select> registros
							</span> <img src="imagens/first.png" class="first" /> <img
								src="imagens/prev.png" class="prev" /> <input type="text"
								class="pagedisplay" /> <img src="imagens/next.png" class="next" />
							<img src="imagens/last.png" class="last" />
						<a href="home.php" id="botaoVoltar">Voltar</a>
						</form>
					</div>

					<script>
    $(function(){
      
      $('table > tbody > tr:odd').addClass('odd');
      
      $('table > tbody > tr').hover(function(){
        $(this).toggleClass('hover');
      });
      
      $('#marcar-todos').click(function(){
        $('table > tbody > tr > td > :checkbox')
          .attr('checked', $(this).is(':checked'))
          .trigger('change');
      });
      
      $('table > tbody > tr > td > :checkbox').bind('click change', function(){
        var tr = $(this).parent().parent();
        if($(this).is(':checked')) $(tr).addClass('selected');
        else $(tr).removeClass('selected');
      });
      
      $('form').submit(function(e){ e.preventDefault(); });
      
      $('#pesquisar').keydown(function(){
        var encontrou = false;
        var termo = $(this).val().toLowerCase();
        $('table > tbody > tr').each(function(){
          $(this).find('td').each(function(){
            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
          });
          if(!encontrou) $(this).hide();
          else $(this).show();
          encontrou = false;
        });
      });
      
      $("table") 
        .tablesorter({
          dateFormat: 'uk',
          headers: {
            0: {
              sorter: false
            },
            5: {
              sorter: false
            }
          }
        }) 
        .tablesorterPager({container: $("#pager")})
        .bind('sortEnd', function(){
          $('table > tbody > tr').removeClass('odd');
          $('table > tbody > tr:odd').addClass('odd');
        });
      
    });
    </script>
				</form>
				<div>
		
		</section>
		<!-- END CONTENT -->

		<!-- BEGIN FOOTER -->
		<footer id="content-footer"> </footer>
		<!-- END FOOTER -->
	</section>
</body>
</html>