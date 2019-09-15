

<div class="form-group">
<label for="Name" class="control-label">{{' Full name'}}</label>
<input type="text" class="form-control {{$errors->has('User')?'is-invalid':''}}" name="name" id="name" value="{{ isset($datos->name)?$datos->name:old('name')}}" >

{!! $errors->first('name','<div class="invalid-feedback">:message</div>')!!} <!--si encuentra primer valor de error muestra el div con el mensaje correspondiente   -->

<label for="Username" class="control-label">{{'Username'}}</label>
<input type="text" class="form-control {{$errors->has('username')?'is-invalid':''}}" name="username" id="username" value="{{ isset($datos->username)?$datos->username:old('username')}}" >


<label for="email" class="control-label">{{'E-mail'}}</label>
<input type="text" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" id="email" value="{{ isset($datos->email)?$datos->email:old('email')}}" >

{!! $errors->first('User','<div class="invalid-feedback">:message</div>')!!} <!--si encuentra primer valor de error muestra el div con el mensaje correspondiente   -->


<label for="password" class="control-label">{{'Password'}}</label>
<input type="text" class="form-control {{$errors->has('password')?'is-invalid':''}}" name="password" id="password" value="{{ isset($datos->password)?$datos->password:old('password')}}" >

{!! $errors->first('User','<div class="invalid-feedback">:message</div>')!!} <!--si encuentra primer valor de error muestra el div con el mensaje correspondiente   -->

<label for="role_id" class="control-label">{{'User Role'}}</label>
<select name="role_id" class="form-control" >
  <option value="1">Admin</option>
  <option value="2">Operator</option>
</select>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Add User':'Modify User data'}}">
<a class="btn btn-primary" href="{{  url('Usuarios') }}">Go Back</a>

</div>
