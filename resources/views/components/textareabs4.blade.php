<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    <div class="form-group">
	  <label for="{{ $name }}">{{ $label }}</label>
	  <textarea 
	    class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" 
	    id="{{ $name }}" 
	    name="{{ $name }}" 
	    rows="{{ $rows }}" 
	    {{ $required ? 'required' : ''}} 
	    {{ $autofocus ? 'autofocus' : '' }}>
	    {{ old($name, isset($value) ? $value : '') }}
	  </textarea>
	  @if ($errors->has($name))
	    <div class="invalid-feedback">
	        {{ $errors->first($name) }}
	    </div>
	  @endif
	</div>
</div>