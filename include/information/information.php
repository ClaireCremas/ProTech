<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="informations.css">
    <title>Informations</title>
</head>

<?php include 'barre_tête.php'; ?>

<body>
    <div class='bg'></div>
    <h1>Informations à savoir sur le GPA et tout</h1>
    <h2>Questions</h2>
    <p>
        Question de la personne numéro 1
    </p>
    <h2>Grade : </h2>
        <p>
            <li>Le grade d’un élève est calculé en fonction de son classement dans un Groupe Pédagogique (GP).</li></br>
            <ul>
                <li>Pour les 10% premiers : A+ ;</li>
                <li>25% suivants : A ;</li>
                <li>30% suivants : B ;</li>
                <li>35% suivants : C.</li></br>
            </ul>

            <li>Ceux qui n’ont pas dépassé la barre seuil d’une Unité Pédagogique (UP) ou d’un GP se voient attribués le grade Fx dans le cas où ils sont convoqués aux rattrapages ; et F si les rattrapages sont impossibles.</li></br>

            <li>En cas de rattrapage, un grade est attribué aux Fx qui dépassent le seuil de validation de l’UP et/ou du GP ; et ceux qui ont rattrapé une épreuve volontairement peuvent voir leur grade changer. Dans ce cas, l’augmentation (ou respectivement la réduction) de grade de cette personne n’entraîne pas le descente (ou respectivement l’augmentation) de grade d’une autre personne.</li></br>

            <li>De même, si les notes autour d’une transition de grade sont relativement proches, le professeur responsable de l’épreuve peut faire le choix de changer la proportion d’élèves dans le grade.</li></br>

            <li>Ce qui signifie que les quotas des grades ne sont pas toujours respectés au pourcentage près. Les pourcentages ci-dessus sont donnés par défaut.</li></br>

        </p>
    <h2>GPA : </h2>
        <p>
            <li>Le GPA est un système de notation permettant de représenter la position de l’élève au sein de sa promotion. </li>
            <li>Il est calculé en faisant la moyenne pondérée des grades obtenus de tous les GP suivis par l’élève.</li>
            <li>Ces grades sont calculés en fonction de la répartition statistique au sein de la promotion. Une valeur est associée à chaque grade : </li>
            <ul>
                <li>A+ : 4,33</li>
                <li>A : 4</li>
                <li>B : 3,33</li>
                <li>C : 2,66</li>
            </ul>

            <li>En faisant la moyenne de tous les grades, on obtient le GPA final de l’élève.</li>

        </p>
    <h2>Seuil : </h2>
        <p>
        <li>Les seuils sont fixés par le professeur responsable de l’UP ou du GP. </li>
        <li>Le premier seuil de validation, défini pour le GP et pour chaque UP, correspond à la note minimale à obtenir pour valider l’UP/GP.</li></br>

        <li>Les autres seuils, définis pour le GP, correspondent aux notes à obtenir pour atteindre chaque grade (A+, A, B, C). </li></br>

        <li>Ces seuils sont fixés une première fois après la première série d’évaluations (avant les rattrapages). </li>
        <li>Le seuil de validation doit être égal ou inférieur à 10/20 (on considère donc qu’un élève ayant la moyenne doit toujours pouvoir valider l’UP/GP). Il est généralement abaissé en dessous de 10/20 pour des UP pour lesquelles l’évaluation est considérée comme étant particulièrement difficile.</li>
        <li>Les seuils des grades du GP sont fixés de manière à correspondre au mieux à la répartition statistique théorique définie dans la partie grade (A+ : 10% premiers; A : 25% suivants; B : 30% suivants; C : 35% suivants). En pratique, on cherche à éviter que deux élèves ayant des notes très proches (0,01 points d’écart par exemple) se retrouvent dans deux grades différents. Le professeur peut donc placer le seuil à un endroit où les notes sont plus éloignées même si cela ne respecte pas idéalement la répartition théorique.</li></br>

        <li>Une fois les seuils fixés, les élèves peuvent voir s’ils ont validé l’UP, s’ils doivent aller à un rattrapage ou s’ils ont une non validation définitive.</li></br>

        <li>Suite aux rattrapages, les seuils peuvent à nouveau être modifiés par le professeur. Ils ne peuvent en revanche qu’être baissés car un élève ne doit pas pouvoir voir son grade diminuer. </li>

        </p>
    <h2>Rattrapage : </h2>
        <p>
        <li>S’il y a non validation d’une UP, c'est-à-dire une note inférieure au seuil de cette UP, l’élève est convoqué aux rattrapages. </li>
        <li>S’il y a non validation d’un GP, malgré la validation de toutes les UP correspondantes, l’élève se doit de choisir une à plusieurs UP qu’il devra rattraper afin d'augmenter sa moyenne du GP.</li></br>

        <li>Autre possibilité: un élève peut se rendre aux rattrapages de manière volontaire afin d'améliorer son grade d’un GP et son GPA.</li></br>

        <li>La note permettant de valider l’UP ou le GP est la meilleure des deux notes (celle obtenue à l’examen et celle obtenue aux rattrapages). Mais néanmoins, la note finale écrite sur le bulletin et permettant de calculer le GPA de l'élève sera la moyenne des 2 notes .</li></br>

        <li>Il est possible, si une mention F figure sur le relevé de notes, que l’élève se voit non validé définitivement un GP et n’aura donc pas accès aux rattrapages. Dans ce cas, le prolongement de scolarité est obligatoire.</li></br>

        </p>
    <h2>Abscences : </h2>
        <p>
        <li>Il y a deux possibilités concernant la gestion des absences :</li></br>

        <li> <span>Premier cas</span> : l’absence est justifiée (validée par la scolarité).</li>
        <li>Si l’élève a fait 50% au moins des évaluations de l’UP, alors cette évaluation est neutralisée, on prendra en compte uniquement les évaluations passées. </li>
        <li>Si  l’élève n’a pas fait 50% des évaluations de l’UP, l’élève ira à l’examen de rattrapage et cette note sera considérée comme sa note initiale.</li></br>

        <li><span>Second cas </span>: l’absence est injustifiée.</li>
        <li>L’élève se voit accorder la note de 0/20 pour l’épreuve et n’aura pas accès à la session de rattrapages de l’épreuve.</li>

        </p>
</body>
</html>