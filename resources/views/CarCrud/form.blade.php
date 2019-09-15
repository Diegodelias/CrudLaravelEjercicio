

<div class="form-group">
<label for="Brand" class="control-label">{{'Brand'}}</label>
<input type="text" class="form-control {{$errors->has('Brand')?'is-invalid':''}}" name="Brand" id="Brand" value="{{ isset($datosCar->Brand)?$datosCar->Brand:old('Brand')}}" >

{!! $errors->first('Brand','<div class="invalid-feedback">:message</div>')!!} <!--si encuentra primer valor de error muestra el div con el mensaje correspondiente   -->



<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Add brand':'Modify Brand'}}">
<a class="btn btn-primary" href="{{  url('CarCrud') }}">Go Back</a>

</div>
