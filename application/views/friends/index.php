<!DOCTYPE html>
<html>
<head>
    <title>Friends</title>
    <?php $this->load->view('partials/header.php')	?>
    <?php $this->load->view('partials/navigation.php')	?>
    <div class="container">
        <div class="main">
        <h2>Hello <?= $userInfo['alias'] ?>!</h2>
        <h3>Here is the list of your friends:</h3>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Alias</th>
                        <th>Action(View)</th>
                        <th>Action(Delete)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($friends == NULL)
                        {
                            echo "<td> You haven't added any friends yet!</td>";
                        }
                        else
                        {
                            foreach ($friends as $friend)
                        {
                    ?>

                    <tr>
                        <td><?= $friend['alias'] ?></td>
                        <td><a href="/users/<?=$friend['friend_id'] ?>">View Profile</a></td> <td> <a href="/remove/<?=$friend['friend_id'] ?>">Remove as Friends</a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <h3>Other Users not on your friend's list:</h3>
        <div class="table2">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Alias</th>
                        <th>Action(Add)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($notFriends == NULL)
                    {
                        echo "<td>No other users to be friends with!</td>";
                    }
                    else
                    {
                        foreach ($notFriends as $notFriend)
                         {
                        ?>
                          <tr>
                              <td><a href="/users/<?= $notFriend['id'] ?>"><?= $notFriend['alias'] ?></a></td>
                              <td><a href="/add/<?= $notFriend['id'] ?>">Add as Friends</a></td>
                          </tr>
                        <?php
                        }

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
