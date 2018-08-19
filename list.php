<?
    if(!isset($name)&&!isset($password));
    {
}
?>

    <hl>Flease Log In</hl>
    This page is secret.
    <form method = post action = "secret.php">
        <table border = 1>
        <tr>
        <th> Username </th>
        <td> <input type = text name = name> </td>
        </tr>
        <tr>
        <th> Password </th>
        <td> -cinput type = password name = passwbrd> </td>
        </tr>
        <tr>
        <td colspan =2 align = center>
        <input type = submit value = "Log In">
        </td>
        </tr>
        </table>
    </form>