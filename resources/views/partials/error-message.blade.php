@if($errors->has($fieldName)) <!--da li postoji greska sa imenom $fieldName -->
@foreach($errors->get($fieldName) as $error) 
    <div class='alert-danger'>{{ $error }}</div>
  @endforeach
@endif  
