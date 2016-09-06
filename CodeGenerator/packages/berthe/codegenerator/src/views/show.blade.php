<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <a href="{{url('/home/sortFilm?titre')}}">Titre</a>
            </th>
            <th>Catégorie</th>
            <th>
                <a href="{{url('/home/sortFilm?annee')}}">Année</a>
            </th>
            <th>Description</th>
        </tr>
    </thead>

    <tbody>
        @forelse($films as $film)
            <tr>
                <td>{{$film->titre}}</td>
                <td>{{$film->categorie}}</td>
                <td>{{$film->annee}}</td>
                <td>{{$film->description}}</td>
            </tr>
        @empty
            <tr>
                <td>No Film.</td>
            </tr>
        @endforelse
    </tbody>
</table>