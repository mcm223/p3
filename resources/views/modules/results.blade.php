@if($haveResults && count($errors) == 0)
    <div class='card'>
        <div class='card-header'>Your Blind Date Book Is:</div>
        <img class='card-img-top' src='<?= $bookResult[1]['cover_url'] ?>'
             alt='Cover photo for the book <?= $bookResult[0] ?>'>
        <div class='card-body'>
            <h5 class='card-title'><?= $bookResult[0] ?></h5>
            <p class='card-text'>by <?= $bookResult[1]['author'] ?></p>
            <a href='<?= $bookResult[1]['purchase_url'] ?>' class='card-link' target='_blank'>Buy
                me!</a>
        </div>
    </div>

@elseif($request && count($errors) == 0)
    <div class='alert alert-danger'>Oops, no results! Try again with different criteria.</div>
@endif