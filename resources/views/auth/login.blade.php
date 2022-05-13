<div class="login-wrapper">
    <form class="form" autocomplete="off" id="AuthForm">
        <img src="{{asset('img/avatar.png')}}" alt="">
        <h2>Login</h2>
        <div>
            <label for="loginUser" id="userLabel" style="color:var(--main-color);margin-bottom:20px;">User Name or
                Email</label>
            <input type="text" name="loginUser" id="loginUser" class="loginUser" required>
        </div>
        <div>
            <label for="loginPassword" id="passLabel"
                style="color:var(--main-color);margin-bottom:20px;">Password</label>
            <input type="password" name="loginPassword" id="loginPassword" class="loginPassword" required>
        </div>
        <div style="position:absolute;width:130px;">
            <h6 id="worning" style="font-size:12px;color:rgb(255, 108, 108);font-weight:light;opacity:0">User Name, Email <br> or Password are incorrect !</h6>
        </div>
        <div class="submit-btn" id="AuthButton">
            <p id="p">Login</p>
            <div class="spinner" id="load" style="position:absolute;bottom: 101px;right:90px;"></div>
        </div>
    </form>
</div>