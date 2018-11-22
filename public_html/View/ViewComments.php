<!DOCTYPE html>
<html>
    <div id="comment-div">
        <p id="tex-tittle">Comentarios</p>
        <p id="area-comentarios">
            <?php
            foreach ($datos as $dato) {
                echo '<a href="perfilVisitante.php?user=' . $dato['name'] . '">' . $dato['name'] . '</a>: ' . $dato['content'] . '<br/>';
            }
            ?>
        </p>   
        <div style="float: center; text-align: center">
            <textarea id="commentBox" rows="2" cols="50" placeholder="Añadir comentario público"></textarea>
            <a id="comentar-btn" style="float: left;" onclick="">Comentar</a>
        </div>
    </div>
