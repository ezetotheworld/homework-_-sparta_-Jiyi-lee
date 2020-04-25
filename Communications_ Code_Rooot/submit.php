<?php
    class ExpDB extends SQLite3 {
        function __construct() {
            $this->open('data.db');
        }
    }

    $db = new ExpDB();
    if(!$db) {
        die($db->lastErrorMsg());
    }

    $sql = <<<EOF
INSERT INTO result (
    p_rooster_rooster_congruity,
    p_wolf_wolf_congruity,
    p_tiger_tiger_congruity,
    p_sheep_sheep_congruity,
    p_frog_frog_congruity,
    p_owl_owl_congruity,
    p_elephant_elephant_congruity,
    p_pig_pig_congruity,
    p_rooster_duck_congruity,
    p_wolf_dog_congruity,
    p_tiger_cat_congruity,
    p_sheep_white_horse_congruity,
    p_frog_lizard_congruity,
    p_owl_crow_congruity,
    p_elephant_cattle_congruity,
    p_pig_hamster_congruity,

    calc1,
    calc2,
    calc3,

    p_rooster_rooster_answer,
    p_rooster_rooster_time,
    p_wolf_wolf_answer,
    p_wolf_wolf_time,
    p_tiger_tiger_answer,
    p_tiger_tiger_time,
    p_sheep_sheep_answer,
    p_sheep_sheep_time,
    p_frog_frog_answer,
    p_frog_frog_time,
    p_owl_owl_answer,
    p_owl_owl_time,
    p_elephant_elephant_answer,
    p_elephant_elephant_time,
    p_pig_pig_answer,
    p_pig_pig_time,
    p_rooster_duck_answer,
    p_rooster_duck_time,
    p_wolf_dog_answer,
    p_wolf_dog_time,
    p_tiger_cat_answer,
    p_tiger_cat_time,
    p_sheep_white_horse_answer,
    p_sheep_white_horse_time,
    p_frog_lizard_answer,
    p_frog_lizard_time,
    p_owl_crow_answer,
    p_owl_crow_time,
    p_elephant_cattle_answer,
    p_elephant_cattle_time,
    p_pig_hamster_answer,
    p_pig_hamster_time,
    p_duck_rooster_answer,
    p_duck_rooster_time,
    p_dog_wolf_answer,
    p_dog_wolf_time,
    p_cat_tiger_answer,
    p_cat_tiger_time,
    p_white_horse_sheep_answer,
    p_white_horse_sheep_time,
    p_lizard_frog_answer,
    p_lizard_frog_time,
    p_crow_owl_answer,
    p_crow_owl_time,
    p_cattle_elephant_answer,
    p_cattle_elephant_time,
    p_hamster_pig_answer,
    p_hamster_pig_time,
    p_duck_duck_answer,
    p_duck_duck_time,
    p_dog_dog_answer,
    p_dog_dog_time,
    p_cat_cat_answer,
    p_cat_cat_time,
    p_white_horse_white_horse_answer,
    p_white_horse_white_horse_time,
    p_lizard_lizard_answer,
    p_lizard_lizard_time,
    p_crow_crow_answer,
    p_crow_crow_time,
    p_cattle_cattle_answer,
    p_cattle_cattle_time,
    p_hamster_hamster_answer,
    p_hamster_hamster_time,
    
    part4_1,
    part4_2,
    part4_3,
    part4_4,
    part4_5,
    part4_6,
    part4_7,
    part4_8,

    partn4_1,
    partn4_2,
    partn4_3,
    partn4_4,
    partn4_5,
    partn4_6,
    partn4_7,
    partn4_8,
    partn4_9,

    part5,

    partn5_1_1,
    partn5_1_2,
    partn5_2_1,
    partn5_2_2,

    nationality,
    ethnicity,
    race,
    parent,
    english,
    stayasia,
    overseaexperience,

    involvement,
    interested,
    motivated,
    happiness,
    sadness,
    anger,
    excitement,
    disgust,

    mturkid,
    comment,
    luckyboxemail
) values (
    :p_rooster_rooster_congruity,
    :p_wolf_wolf_congruity,
    :p_tiger_tiger_congruity,
    :p_sheep_sheep_congruity,
    :p_frog_frog_congruity,
    :p_owl_owl_congruity,
    :p_elephant_elephant_congruity,
    :p_pig_pig_congruity,
    :p_rooster_duck_congruity,
    :p_wolf_dog_congruity,
    :p_tiger_cat_congruity,
    :p_sheep_white_horse_congruity,
    :p_frog_lizard_congruity,
    :p_owl_crow_congruity,
    :p_elephant_cattle_congruity,
    :p_pig_hamster_congruity,

    :calc1,
    :calc2,
    :calc3,

    :p_rooster_rooster_answer,
    :p_rooster_rooster_time,
    :p_wolf_wolf_answer,
    :p_wolf_wolf_time,
    :p_tiger_tiger_answer,
    :p_tiger_tiger_time,
    :p_sheep_sheep_answer,
    :p_sheep_sheep_time,
    :p_frog_frog_answer,
    :p_frog_frog_time,
    :p_owl_owl_answer,
    :p_owl_owl_time,
    :p_elephant_elephant_answer,
    :p_elephant_elephant_time,
    :p_pig_pig_answer,
    :p_pig_pig_time,
    :p_rooster_duck_answer,
    :p_rooster_duck_time,
    :p_wolf_dog_answer,
    :p_wolf_dog_time,
    :p_tiger_cat_answer,
    :p_tiger_cat_time,
    :p_sheep_white_horse_answer,
    :p_sheep_white_horse_time,
    :p_frog_lizard_answer,
    :p_frog_lizard_time,
    :p_owl_crow_answer,
    :p_owl_crow_time,
    :p_elephant_cattle_answer,
    :p_elephant_cattle_time,
    :p_pig_hamster_answer,
    :p_pig_hamster_time,
    :p_duck_rooster_answer,
    :p_duck_rooster_time,
    :p_dog_wolf_answer,
    :p_dog_wolf_time,
    :p_cat_tiger_answer,
    :p_cat_tiger_time,
    :p_white_horse_sheep_answer,
    :p_white_horse_sheep_time,
    :p_lizard_frog_answer,
    :p_lizard_frog_time,
    :p_crow_owl_answer,
    :p_crow_owl_time,
    :p_cattle_elephant_answer,
    :p_cattle_elephant_time,
    :p_hamster_pig_answer,
    :p_hamster_pig_time,
    :p_duck_duck_answer,
    :p_duck_duck_time,
    :p_dog_dog_answer,
    :p_dog_dog_time,
    :p_cat_cat_answer,
    :p_cat_cat_time,
    :p_white_horse_white_horse_answer,
    :p_white_horse_white_horse_time,
    :p_lizard_lizard_answer,
    :p_lizard_lizard_time,
    :p_crow_crow_answer,
    :p_crow_crow_time,
    :p_cattle_cattle_answer,
    :p_cattle_cattle_time,
    :p_hamster_hamster_answer,
    :p_hamster_hamster_time,

    :part4_1,
    :part4_2,
    :part4_3,
    :part4_4,
    :part4_5,
    :part4_6,
    :part4_7,
    :part4_8,

    :partn4_1,
    :partn4_2,
    :partn4_3,
    :partn4_4,
    :partn4_5,
    :partn4_6,
    :partn4_7,
    :partn4_8,
    :partn4_9,

    :part5,

    :partn5_1_1,
    :partn5_1_2,
    :partn5_2_1,
    :partn5_2_2,

    :nationality,
    :ethnicity,
    :race,
    :parent,
    :english,
    :stayasia,
    :overseaexperience,

    :involvement,
    :interested,
    :motivated,
    :happiness,
    :sadness,
    :anger,
    :excitement,
    :disgust,

    :mturkid,
    :comment,
    :luckyboxemail
)
EOF;
/** (질문) 이 파트의 의미가 무엇일까 */
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":p_rooster_rooster_congruity", $_POST["p_rooster_rooster_congruity"]);
    $stmt->bindValue(":p_wolf_wolf_congruity", $_POST["p_wolf_wolf_congruity"]);
    $stmt->bindValue(":p_tiger_tiger_congruity", $_POST["p_tiger_tiger_congruity"]);
    $stmt->bindValue(":p_sheep_sheep_congruity", $_POST["p_sheep_sheep_congruity"]);
    $stmt->bindValue(":p_frog_frog_congruity", $_POST["p_frog_frog_congruity"]);
    $stmt->bindValue(":p_owl_owl_congruity", $_POST["p_owl_owl_congruity"]);
    $stmt->bindValue(":p_elephant_elephant_congruity", $_POST["p_elephant_elephant_congruity"]);
    $stmt->bindValue(":p_pig_pig_congruity", $_POST["p_pig_pig_congruity"]);
    $stmt->bindValue(":p_rooster_duck_congruity", $_POST["p_rooster_duck_congruity"]);
    $stmt->bindValue(":p_wolf_dog_congruity", $_POST["p_wolf_dog_congruity"]);
    $stmt->bindValue(":p_tiger_cat_congruity", $_POST["p_tiger_cat_congruity"]);
    $stmt->bindValue(":p_sheep_white_horse_congruity", $_POST["p_sheep_white_horse_congruity"]);
    $stmt->bindValue(":p_frog_lizard_congruity", $_POST["p_frog_lizard_congruity"]);
    $stmt->bindValue(":p_owl_crow_congruity", $_POST["p_owl_crow_congruity"]);
    $stmt->bindValue(":p_elephant_cattle_congruity", $_POST["p_elephant_cattle_congruity"]);
    $stmt->bindValue(":p_pig_hamster_congruity", $_POST["p_pig_hamster_congruity"]);

    $stmt->bindValue(":calc1", $_POST["calc1"]);
    $stmt->bindValue(":calc2", $_POST["calc2"]);
    $stmt->bindValue(":calc3", $_POST["calc3"]);

    $stmt->bindValue(":p_rooster_rooster_answer", $_POST["p_rooster_rooster_answer"]);
    $stmt->bindValue(":p_rooster_rooster_time", $_POST["p_rooster_rooster_time"]);
    $stmt->bindValue(":p_wolf_wolf_answer", $_POST["p_wolf_wolf_answer"]);
    $stmt->bindValue(":p_wolf_wolf_time", $_POST["p_wolf_wolf_time"]);
    $stmt->bindValue(":p_tiger_tiger_answer", $_POST["p_tiger_tiger_answer"]);
    $stmt->bindValue(":p_tiger_tiger_time", $_POST["p_tiger_tiger_time"]);
    $stmt->bindValue(":p_sheep_sheep_answer", $_POST["p_sheep_sheep_answer"]);
    $stmt->bindValue(":p_sheep_sheep_time", $_POST["p_sheep_sheep_time"]);
    $stmt->bindValue(":p_frog_frog_answer", $_POST["p_frog_frog_answer"]);
    $stmt->bindValue(":p_frog_frog_time", $_POST["p_frog_frog_time"]);
    $stmt->bindValue(":p_owl_owl_answer", $_POST["p_owl_owl_answer"]);
    $stmt->bindValue(":p_owl_owl_time", $_POST["p_owl_owl_time"]);
    $stmt->bindValue(":p_elephant_elephant_answer", $_POST["p_elephant_elephant_answer"]);
    $stmt->bindValue(":p_elephant_elephant_time", $_POST["p_elephant_elephant_time"]);
    $stmt->bindValue(":p_pig_pig_answer", $_POST["p_pig_pig_answer"]);
    $stmt->bindValue(":p_pig_pig_time", $_POST["p_pig_pig_time"]);
    $stmt->bindValue(":p_rooster_duck_answer", $_POST["p_rooster_duck_answer"]);
    $stmt->bindValue(":p_rooster_duck_time", $_POST["p_rooster_duck_time"]);
    $stmt->bindValue(":p_wolf_dog_answer", $_POST["p_wolf_dog_answer"]);
    $stmt->bindValue(":p_wolf_dog_time", $_POST["p_wolf_dog_time"]);
    $stmt->bindValue(":p_tiger_cat_answer", $_POST["p_tiger_cat_answer"]);
    $stmt->bindValue(":p_tiger_cat_time", $_POST["p_tiger_cat_time"]);
    $stmt->bindValue(":p_sheep_white_horse_answer", $_POST["p_sheep_white_horse_answer"]);
    $stmt->bindValue(":p_sheep_white_horse_time", $_POST["p_sheep_white_horse_time"]);
    $stmt->bindValue(":p_frog_lizard_answer", $_POST["p_frog_lizard_answer"]);
    $stmt->bindValue(":p_frog_lizard_time", $_POST["p_frog_lizard_time"]);
    $stmt->bindValue(":p_owl_crow_answer", $_POST["p_owl_crow_answer"]);
    $stmt->bindValue(":p_owl_crow_time", $_POST["p_owl_crow_time"]);
    $stmt->bindValue(":p_elephant_cattle_answer", $_POST["p_elephant_cattle_answer"]);
    $stmt->bindValue(":p_elephant_cattle_time", $_POST["p_elephant_cattle_time"]);
    $stmt->bindValue(":p_pig_hamster_answer", $_POST["p_pig_hamster_answer"]);
    $stmt->bindValue(":p_pig_hamster_time", $_POST["p_pig_hamster_time"]);
    $stmt->bindValue(":p_duck_rooster_answer", $_POST["p_duck_rooster_answer"]);
    $stmt->bindValue(":p_duck_rooster_time", $_POST["p_duck_rooster_time"]);
    $stmt->bindValue(":p_dog_wolf_answer", $_POST["p_dog_wolf_answer"]);
    $stmt->bindValue(":p_dog_wolf_time", $_POST["p_dog_wolf_time"]);
    $stmt->bindValue(":p_cat_tiger_answer", $_POST["p_cat_tiger_answer"]);
    $stmt->bindValue(":p_cat_tiger_time", $_POST["p_cat_tiger_time"]);
    $stmt->bindValue(":p_white_horse_sheep_answer", $_POST["p_white_horse_sheep_answer"]);
    $stmt->bindValue(":p_white_horse_sheep_time", $_POST["p_white_horse_sheep_time"]);
    $stmt->bindValue(":p_lizard_frog_answer", $_POST["p_lizard_frog_answer"]);
    $stmt->bindValue(":p_lizard_frog_time", $_POST["p_lizard_frog_time"]);
    $stmt->bindValue(":p_crow_owl_answer", $_POST["p_crow_owl_answer"]);
    $stmt->bindValue(":p_crow_owl_time", $_POST["p_crow_owl_time"]);
    $stmt->bindValue(":p_cattle_elephant_answer", $_POST["p_cattle_elephant_answer"]);
    $stmt->bindValue(":p_cattle_elephant_time", $_POST["p_cattle_elephant_time"]);
    $stmt->bindValue(":p_hamster_pig_answer", $_POST["p_hamster_pig_answer"]);
    $stmt->bindValue(":p_hamster_pig_time", $_POST["p_hamster_pig_time"]);
    $stmt->bindValue(":p_duck_duck_answer", $_POST["p_duck_duck_answer"]);
    $stmt->bindValue(":p_duck_duck_time", $_POST["p_duck_duck_time"]);
    $stmt->bindValue(":p_dog_dog_answer", $_POST["p_dog_dog_answer"]);
    $stmt->bindValue(":p_dog_dog_time", $_POST["p_dog_dog_time"]);
    $stmt->bindValue(":p_cat_cat_answer", $_POST["p_cat_cat_answer"]);
    $stmt->bindValue(":p_cat_cat_time", $_POST["p_cat_cat_time"]);
    $stmt->bindValue(":p_white_horse_white_horse_answer", $_POST["p_white_horse_white_horse_answer"]);
    $stmt->bindValue(":p_white_horse_white_horse_time", $_POST["p_white_horse_white_horse_time"]);
    $stmt->bindValue(":p_lizard_lizard_answer", $_POST["p_lizard_lizard_answer"]);
    $stmt->bindValue(":p_lizard_lizard_time", $_POST["p_lizard_lizard_time"]);
    $stmt->bindValue(":p_crow_crow_answer", $_POST["p_crow_crow_answer"]);
    $stmt->bindValue(":p_crow_crow_time", $_POST["p_crow_crow_time"]);
    $stmt->bindValue(":p_cattle_cattle_answer", $_POST["p_cattle_cattle_answer"]);
    $stmt->bindValue(":p_cattle_cattle_time", $_POST["p_cattle_cattle_time"]);
    $stmt->bindValue(":p_hamster_hamster_answer", $_POST["p_hamster_hamster_answer"]);
    $stmt->bindValue(":p_hamster_hamster_time", $_POST["p_hamster_hamster_time"]);

    $stmt->bindValue(":part4_1", $_POST["part4_1"]);
    $stmt->bindValue(":part4_2", $_POST["part4_2"]);
    $stmt->bindValue(":part4_3", $_POST["part4_3"]);
    $stmt->bindValue(":part4_4", $_POST["part4_4"]);
    $stmt->bindValue(":part4_5", $_POST["part4_5"]);
    $stmt->bindValue(":part4_6", $_POST["part4_6"]);
    $stmt->bindValue(":part4_7", $_POST["part4_7"]);
    $stmt->bindValue(":part4_8", $_POST["part4_8"]);

    $stmt->bindValue(":partn4_1", $_POST["partn4_1"]);
    $stmt->bindValue(":partn4_2", $_POST["partn4_2"]);
    $stmt->bindValue(":partn4_3", $_POST["partn4_3"]);
    $stmt->bindValue(":partn4_4", $_POST["partn4_4"]);
    $stmt->bindValue(":partn4_5", $_POST["partn4_5"]);
    $stmt->bindValue(":partn4_6", $_POST["partn4_6"]);
    $stmt->bindValue(":partn4_7", $_POST["partn4_7"]);
    $stmt->bindValue(":partn4_8", $_POST["partn4_8"]);
    $stmt->bindValue(":partn4_9", $_POST["partn4_9"]);

    $stmt->bindValue(":part5", $_POST["part5"]);

    $stmt->bindValue(":partn5_1_1", $_POST["partn5_1_1"]);
    $stmt->bindValue(":partn5_1_2", $_POST["partn5_1_2"]);
    $stmt->bindValue(":partn5_2_1", $_POST["partn5_2_1"]);
    $stmt->bindValue(":partn5_2_2", $_POST["partn5_2_2"]);

    $stmt->bindValue(":nationality", $_POST["nationality"]);
    $stmt->bindValue(":ethnicity", $_POST["ethnicity"]);
    $stmt->bindValue(":race", $_POST["race"]);
    $stmt->bindValue(":parent", $_POST["parent"]);
    $stmt->bindValue(":english", $_POST["english"]);
    $stmt->bindValue(":stayasia", $_POST["stayasia"]);
    $stmt->bindValue(":overseaexperience", $_POST["overseaexperience"]);

    $stmt->bindValue(":involvement", $_POST["involvement"]);
    $stmt->bindValue(":interested", $_POST["interested"]);
    $stmt->bindValue(":motivated", $_POST["motivated"]);
    $stmt->bindValue(":happiness", $_POST["happiness"]);
    $stmt->bindValue(":sadness", $_POST["sadness"]);
    $stmt->bindValue(":anger", $_POST["anger"]);
    $stmt->bindValue(":excitement", $_POST["excitement"]);
    $stmt->bindValue(":disgust", $_POST["disgust"]);

    $stmt->bindValue(":mturkid", $_POST["mturkid"]);
    $stmt->bindValue(":comment", $_POST["comment"]);
    $stmt->bindValue(":luckyboxemail", $_POST["luckyboxemail"]);
    $stmt->execute();
    $db->close();
?>
