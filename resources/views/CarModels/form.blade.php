

<div class="form-group">
<label for="Model" class="control-label">{{'Model'}}</label>
<input type="text" class="form-control {{$errors->has('Model')?'is-invalid':''}}" name="Model" id="Model" value="{{ isset($datosCar->Model)?$datosCar->Model:old('Model')}}" >

{!! $errors->first('Model','<div class="invalid-feedback">:message</div>')!!} <!--si encuentra primer valor de error muestra el div con el mensaje correspondiente   -->



<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Add model':'Modify Model'}}">
<a class="btn btn-primary" href="{{  url('CarModels') }}">Go Back</a>

</div>
