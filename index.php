<?php

require_once __DIR__.DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."config.php";

$sql_select = "SELECT * FROM todolist ORDER BY id DESC";
$result = $connection->query($sql_select);

?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist V1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>

    <main class="container">
        <article>
            <hgroup class="text-center">
                <h1>Todolist</h1>
                <p>Simpan idemu di sini</p>
            </hgroup> 
            
            <form action="app/process/create.php" method="post">
                <fieldset role="group">
                    <input type="text" name="todo-text" placeholder="Tulis rencanamu . . ." maxlength="100" required>
                    <input type="submit" name="submit" value="Simpan">
                </fieldset>
                <small>Maksimal 100 karakter</small>
            </form>

            <table class="striped">
                <thead>
                    <th>Todo</th>
                    <th>Action</th>
                </thead>

                <?php if ($result->num_rows > 0): ?>
                    <tbody>
                        <?php while($todo = $result->fetch_assoc()):?>
                            <tr>
                                <td>
                                    <?php if($todo['status']==1):?>
                                        <del><?php echo $todo['text'];?></del>
                                    <?php else:?>
                                        <?php echo $todo['text'];?>
                                    <?php endif; ?>                                    
                                </td>
                                <td style="display: flex; justify-content: space-around">
                                    <a href="app/process/update.php?todo-id=<?php echo $todo['id'];?>&todo-status=<?php echo $todo['status'];?>">
                                        <?php if($todo['status']==1): ?>
                                            <i class="bi bi-arrow-clockwise"></i>
                                        <?php else:?>
                                            <i class="bi bi-check-lg"></i> 
                                        <?php endif; ?>                                    
                                    </a>
                                    <a href="app/process/delete.php?todo-id=<?=$todo['id'];?>">
                                        <i class="bi bi-trash-fill"></i> 
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                <?php else: ?>
                    <p>Tidak ada rencana apapun di sini! Masukkan rencana barumu!</p>
                <?php endif; ?>
            </table>

            <footer class="text-center">
                <p>v 1.0.0</p>
                <p>Alhazen Academy</p>
            </footer>
        </article>              
    </main>
    
</body>
</html>