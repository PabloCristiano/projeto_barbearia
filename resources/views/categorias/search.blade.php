<form action="#" method="get">
    @csrf
    <div class="input-group col-md-4">
        <input class="form-control" type="text" name="searchText" placeholder="Buscar..."  aria-label="Search" aria-describedby="basic-addon2" />
        <div class="input-group-append">
            <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> Buscar</button>
        </div>
    </div>
</form>