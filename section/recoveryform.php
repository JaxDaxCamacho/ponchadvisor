
<!--ao preeencher este registo autentico-me como o utilizador e recebo um link
com o token para trocar de password-->
<div id="registo">

<form method="post">
<div class="form-group">
<label >Nome Completo</label>
<input  required type="text" name="nome" class="form-control" aria-describedby="BarName" placeholder="John Doe da Silva">

</div>
<div class="form-group">
<label >Nome de Utilizador</label>
<input  required type="text" name="username" class="form-control"  placeholder="JohnSilvas">
</div>
<div class="form-group">
<label >E-mail</label>
<input required type="email" name="email" class="form-control"  placeholder="Mensagem rapida">
<small class="form-text text-muted">vamos enviar um link para este email para recuperação</small>
</div>


<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>   
</div>