<h1>Formulaire d'ajout {{ucfirst($table['title'])}}</h1>
<form action="{{$table['title']}}" method="post">@if( array_key_exists('attributs', $table) )@foreach($table['attributs'] as $attrName => $attrType)
		@if(gettype($attrType) == gettype(''))

				<div class="form-group-lg">
					<label id="{{$attrName}}">{{ucfirst($attrName)}}</label>
					<input type="text" name="{{$attrName}}" class="form-control" placeholder="{{$attrName}}"/>
				</div>
		@endif

		@if(gettype($attrType) == gettype(0))    	<div class="form-group-lg">
						<label id="{{$attrName}}">{{ucfirst($attrName)}}</label>
						<input type="number" name="{{$attrName}}" class="form-control" placeholder="{{$attrName}}"/>
				</div>
			@endif @endforeach @endif

	@if(array_key_exists('relations', $table))@foreach($table['relations'] as $relationType => $tab)@if($relationType == "hasMany")
			<div class="form-group-lg">
				<label id="{{$tab[0]}}">{{ucfirst($tab[0])}}</label>
				<select name="{{$tab[0]}}select" class="form-control"></select>
			</div>
	@elseif($relationType == "belongsTo")
			<div class="form-group-lg">
					<label id="{{$tab[0]}}">{{ucfirst($tab[0])}}</label>
					<select name="{{$tab[0]}}select" class="form-control"></select>
				</div>
	@endif @endforeach @endif

				<br/><div class="form-group-lg">
					<button type="submit" class="btn btn-primary">Soumettre</button>
					<button type="reset" class="btn btn-primary">Annuler</button>
				</div>
</form>
