<!-- formulario de registo de utilizadores -->
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
            <small class="form-text text-muted">O seu e-mail nunca será partilhado com ninguem</small>
        </div>
        <div class="form-group">
            <label >Password</label>
            <input required type="password" name="password" class="form-control"  placeholder="Mensagem rapida">
            <small class="form-text text-muted">O seu e-mail nunca será partilhado com ninguem</small>
        </div>
        <div class="form-group">
            <label >Comfirme a sua password</label>
            <input required type="password" name="password2" class="form-control"  placeholder="Mensagem rapida">
            <small class="form-text text-muted">O seu e-mail nunca será partilhado com ninguem</small>
        </div>
        
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>   
</div>