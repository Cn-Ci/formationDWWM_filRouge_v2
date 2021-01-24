<div id="barForum" class="row">

    <div class="col-12 col-lg-2">
        <select class="form-control w-100 my-3" name="filter" id="filter">
            <option value="">Trier par</option>
            <option value="Date">Date</option>
            <option value="NombreDeCommentaire">Nombre de commentaire</option>
        </select>
    </div> 

    <div class="col-12 col-lg-8">     
        <form class="my-3">
            <input id="SearchBar" class="form-control" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>


    <div class="col-12 col-lg-2 text-center">
        <a href="../controller/controllerCreatePostForum.php"><button type="submit" class="btn btn-success color-228B22 my-3" id="boutonsubmit">+ Créer un post</button></a>
    </div>
</div>

<style>
    #barForum{
        margin-top    : 10%;
        border-bottom : 1px solid rgba(0,0,0,0.1);
        padding       : 150px 10px 0px 10px;
        margin        : 0px 0px 0px 0px;
    }
    #dropBox{
        background-color: white;
    }
</style>