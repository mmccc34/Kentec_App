<div class="m-5">
    <div class="p-5 rounded " id="calendar">
        <div class="text-center row pt-3" id="thead">
            <div class="col-2 d-flex flex-column justify-content-end">
                <p>Developpeurs</p>
            </div>
            <div class="col-2">
                <h4>Lundi</h4>
                <p><?= $days[0] ?></p>
            </div>
            <div class="col-2">
                <h4>Mardi</h4>
                <p><?= $days[1] ?></p>

            </div>
            <div class="col-2">
                <h4>Mercredi</h4>
                <p><?= $days[2] ?></p>
            </div>
            <div class="col-2">
                <h4>Jeudi</h4>
                <p><?= $days[3] ?></p>
            </div>
            <div class="col-2">
                <h4>Vendredi</h4>
                <p><?= $days[4] ?></p>
            </div>
        </div>
        <?php foreach ($devs as $dev): ?>
            <div id="planning-dev-<?=$dev->getId();?>" class="row">
            <div class="day col-2 py-4 px-0 d-flex justify-content-space-evenly flex-column text-center">
                <h4><?=$dev->getName();?></h4>
            </div>
            <div class="day col-2   px-0 d-flex justify-content-space-evenly flex-column">
            </div>
            <div class="day col-2   px-0 d-flex justify-content-space-evenly flex-column">


            </div>
            <div class="day col-2   px-0 d-flex justify-content-space-evenly flex-column">
            </div>
            <div class="day col-2   px-0 d-flex justify-content-space-evenly flex-column">
            </div>
            <div class="day col-2   px-0 d-flex justify-content-space-evenly flex-column">


            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>