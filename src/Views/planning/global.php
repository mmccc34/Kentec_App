<div class="m-5">
    <div class="p-5 rounded " id="calendar">
        <?php

        use Sthom\App\Service\PlanningService;
        use Sthom\App\Service\StateService;

        $date = new DateTime($days[0]);
        $next = clone $date;
        $previous = clone $date;
        $next->modify("+7 days");
        $previous->modify("-7 days");
        ?>
        <div class="d-flex justify-content-between pb-3">
            <a class="btn btn-light" href="/planning/<?= $previous->format("Y-m-d") ?>"><</a>
            <a class="btn btn-light" href="/planning/<?= $next->format("Y-m-d") ?>">></a>
        </div>
        <div class="text-center row pt-3" id="thead">
            <div class="col-2 d-flex flex-column justify-content-end">
                <p>Développeurs</p>
            </div>
            <div class="col-2">
                <h4>Lundi</h4>
                <p><?= PlanningService::dateToFrFormat($days[0]) ?></p>
            </div>
            <div class="col-2">
                <h4>Mardi</h4>
                <p><?= PlanningService::dateToFrFormat($days[1]) ?></p>
            </div>
            <div class="col-2">
                <h4>Mercredi</h4>
                <p><?= PlanningService::dateToFrFormat($days[2]) ?></p>
            </div>
            <div class="col-2">
                <h4>Jeudi</h4>
                <p><?= PlanningService::dateToFrFormat($days[3]) ?></p>
            </div>
            <div class="col-2">
                <h4>Vendredi</h4>
                <p><?= PlanningService::dateToFrFormat($days[4]) ?></p>
            </div>
        </div>
        <?php if ($devs === "null"): ?>
            <div class="alert alert-warning text-center mt-3">
                Aucun développeur
            </div>
        <?php else: ?>
            <?php foreach ($devs as $dev):
                $tasks = $sortedTasks[$dev->getId()];
            ?>
                <div id="planning-dev-<?= $dev->getId(); ?>" class="row">
                    <div class="day col-2 py-4 px-0 d-flex justify-content-space-evenly flex-column text-center">
                        <h4><?= $dev->getName(); ?></h4>
                    </div>
                    <?php foreach ($days as $day):
                    ?>
                        <div class="day day-to-click col-2 px-0 d-flex justify-content-space-evenly" data-dev="<?= $dev->getId() ?>" data-day="<?= $day ?>" data-devname="<?= $dev->getFirstname() ?> <?= $dev->getName() ?>">
                            <?php if (isset($tasks[$day])):
                                $task = $tasks[$day];
                                $date1 = new DateTime($task["displayStartDate"]);
                                $length = $date1->diff(new DateTime($task["displayEndDate"]))->days + 1;
                                $length *= 100;
                                $colors = StateService::getColor($task["idState"]);
                            ?>
                                <div id="task-<?= $task["id"] ?>" class="task rounded p-2 my-3 d-flex justify-content-between" style="flex-shrink: 0; background-color: <?= $colors[0] ?>;color: <?= $colors[1] ?>; width: <?= $length ?>%;">
                                    <p><?= $task["name"] ?></p>
                                    <button style="color:black;" class="btn btn-danger btn-delete-task" data-idtask="<?= $task["id"] ?>">X</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<div class="modal" id="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center;">
    <div class="modal-content text-center" style="background: white; padding: 20px; border-radius: 5px; text-align: center; width: 45%;">
        <h3 id="modal-message">Nouvelle tache</h3>
        <h4 id="dev"></h4>

        <div id="modal-form" style="display: block;">
            <form action="/task/create" method="POST" class="container mt-5 d-flex">
                <div class="d-flex flex-column mx-5">
                        <input required type="text" id="dev-id" name="dev-id" class="d-none">
                    <div class="form-group m-2">
                        <label for="name">Nom de la tâche :</label>
                        <input required  type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group m-2">
                        <label for="description">Description :</label>
                        <textarea required  id="description" name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group m-2">
                        <label for="startDate">Date de début :</label>
                        <input required  type="date" id="startDate" name="startDate" class="form-control">
                    </div>

                    <div class="form-group m-2">
                        <label for="endDate">Date de fin :</label>
                        <input required  type="date" id="endDate" name="endDate" class="form-control">
                    </div>
                </div>

                <div class="d-flex flex-column mx-5">

                    <div class="form-group m-2">
                        <label for="effort">Effort (en jour Homme) :</label>
                        <input required  type="number" id="effort" name="effort" class="form-control">
                    </div>

                    <div class="form-group m-2">
                        <label for="idProject">Projet :</label>
                        <select id="idProject" name="idProject" class="form-control" required>
                            <option disabled selected value="">Sélectionnez un projet</option>
                            <?php foreach($projects as $project): ?>
                                <option value="<?= $project->getId(); ?>"><?= $project->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="idState">État :</label>
                        <select id="idState" name="idState" class="form-control" required>
                            <option disabled selected value="">Sélectionnez un état</option>
                            <option value="1">Non commencé</option>
                            <option value="2">En cours</option>
                            <option value="3">Terminé</option>
                            <option value="4">Annulé</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
                </div>
            </form>

        </div>

        <button id="close-modal" class="btn btn-primary" style="position:fixed;">x</button>
    </div>
</div>
<div id="popup-success" style="z-index: 11;display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
  <p id="popup-message">Client supprimé avec succès !</p>

</div>

<script defer src="../manageTaskOnCalendar.js"></script>