 <header>
                    <h3 align="center"> 
					
    Авторизация</h3>
                </header>
<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" class="form-signin" method="post"><div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div>                    <div class="vertical-form-group">
                        <label class="label-w" for="UserName">Логин</label>
                        <input class="form-control"  name="login" type="text">
                    </div>
                    <div class="vertical-form-group">
                        <label class="label-w" for="password">Пароль</label>
                        <input class="form-control"  name="Password" type="password">
                    </div>
    <div class="vertical-form-group">
        
        </div>
        <div class="vertical-form-group"></div>
        <div class="vertical-form-group">
        <button type="submit" class="btn btn-success" style="margin-bottom:20px;">
                Войти
            </button>
        </div>
</form>  