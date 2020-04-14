<select class="form-control" id="seleccionarPais" name="estado">

	<option selected disabled>

		Seleccione una región

	</option>

	<option value="AS" {{ old('estado', $element->pais) === 'AS' ? 'selected' : '' }}>

		Aguascalientes

	</option>

	<option value="BC" {{-- selected="{{ old('estado') === "BC" ? 'selected' : '' }}" --}}>

		Baja California

	</option>

	<option value="BS" {{-- selected="{{ old('estado') === "BS" ? 'selected' : '' }}" --}}>

		Baja California Sur

	</option>

	<option value="CC" selected="{{ old('estado') === "CC" ? 'selected' : '' }}">

		Campeche

	</option>
 
	<option value="CS" selected="{{ old('estado') === "CS" ? 'selected' : '' }}">

		Chiapas

	</option>

	<option value="CH" selected="{{ old('estado') === "CH" ? 'selected' : '' }}">

		Chihuahua

	</option>

	<option value="CL" selected="{{ old('estado') === "CL" ? 'selected' : '' }}">

		Coahuila

	</option>

	<option value="CM" selected="{{ old('estado') === "CM" ? 'selected' : '' }}">

		Colima

	</option>

	<option value="MX" selected="{{ old('estado') === "MX" ? 'selected' : '' }}">

		Ciudad / Estado de México

	</option>

	<option value="GT" selected="{{ old('estado') === "GT" ? 'selected' : '' }}">

		Guanajuato

	</option>

	<option value="GR" selected="{{ old('estado') === "GR" ? 'selected' : '' }}">

		Guerrero

	</option>

	<option value="HG" selected="{{ old('estado') === "HG" ? 'selected' : '' }}">

		Hclassalgo

	</option>

	<option value="JC" selected="{{ old('estado') === "JC" ? 'selected' : '' }}">

		Jalisco

	</option>

	<option value="MN" selected="{{ old('estado') === "MN" ? 'selected' : '' }}">

		Michoacan

	</option>

	<option value="MS" {{-- selected="{{ old('estado') === "MS" ? 'selected' : '' }}" --}}>

		Morelos

	</option>

</select>

