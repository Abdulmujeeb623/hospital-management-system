<h1>Ask the Doctor</h1>
        <form action="process.php" method="post">
            <div class="form-group">
                <label for="question">Your Question:</label>
                <textarea class="form-control" name="question" id="question" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ask</button>
        </form>
        
        
        <form action="process.php" method="post">
    <input type="hidden" name="question_id" value="1"> <!-- Replace 1 with the actual question ID -->
    <div class="form-group">
        <label for="comment">Your Comment:</label>
        <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Comment</button>
</form>


<?php foreach ($data as $row) { ?>
    <div class="card">
        <div class="card-body">
            <p><?php echo $row['question']; ?></p>
            <?php if (!empty($row['comment'])) { ?>
                <div class="alert alert-secondary" role="alert">
                    <strong>Doctor's Comment:</strong> <?php echo $row['comment']; ?>
                </div>
            <?php } else { ?>
                <!-- Show the comment form for questions without doctor comments -->
                <form action="process.php" method="post">
                    <input type="hidden" name="question_id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="comment">Your Comment:</label>
                        <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            <?php } ?>
        </div>
    </div>
<?php } ?>












<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Ask the Doctor</h1>
        <form action="process.php" method="post">
            <div class="form-group">
                <label for="comment">Your Comment/Question:</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr>
        <h2>Questions and Comments</h2>
        <div id="question-list">
            <!-- Questions and comments will be displayed here -->
            <?php
            $doctorUserSystem = new DoctorUserSystem();
            $data = $doctorUserSystem->getQuestionsAndComments();

            foreach ($data as $row) {
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<p>' . $row['comment'] . '</p>';
                if (!empty($row['question'])) {
                    echo '<div class="alert alert-info" role="alert">';
                    echo '<strong>User\'s Question:</strong> ' . $row['question'];
                    echo '</div>';
                }
                if (!empty($row['doctor_comment'])) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<strong>Doctor\'s Comment:</strong> ' . $row['doctor_comment'];
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
