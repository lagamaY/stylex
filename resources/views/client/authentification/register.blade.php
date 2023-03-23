<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <title>Daily UI | #001 - Sign Up</title>
  <link href="{{asset('auth_compte_client/register/register.css')}}" rel="stylesheet">
  <!-- <link href="{{asset('auth_compte_client/login/style.css')}}" rel="stylesheet"> -->

  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body class="align">

<!-- multistep form -->
<form id="multistepsform">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Créer votre compte</li>
    <li>Données personnelles</li>
    <li>Social Profiles</li>

  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">
    <svg xmlns="http://www.w3.org/2000/svg" class="site__logo" width="56" height="84" viewBox="77.7 214.9 274.7 412"><defs><linearGradient id="a" x1="0%" y1="0%" y2="0%"><stop offset="0%" stop-color="#8ceabb"/><stop offset="100%" stop-color="#378f7b"/></linearGradient></defs><path fill="url(#a)" d="M215 214.9c-83.6 123.5-137.3 200.8-137.3 275.9 0 75.2 61.4 136.1 137.3 136.1s137.3-60.9 137.3-136.1c0-75.1-53.7-152.4-137.3-275.9z"/></svg>

    </h2>

    <h2 class="fs-title">Créer votre compte</li>
    <h3 class="fs-subtitle"></h3>
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="pass" placeholder="Password" />
    <input type="password" name="cpass" placeholder="Confirm Password" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>
    <h2 class="fs-title">Données personnelles</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" placeholder="First Name" />
    <input type="text" name="lname" placeholder="Last Name" />
    <input type="text" name="phone" placeholder="Phone" />
    <textarea name="address" placeholder="Address"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />

    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Données personnelles</h2>
    <h3 class="fs-subtitle">On y est presque... encore quelques détails</h3>
    <input type="text" name="twitter" placeholder="Twitter" />
    <input type="text" name="facebook" placeholder="Facebook" />
    <input type="text" name="gplus" placeholder="Google Plus" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>

  <script src="{{asset('auth_compte_client/register/register.js')}}"></script>
</body>
</html>






