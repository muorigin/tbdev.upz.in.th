<?php

if ( ! defined( 'IN_TBDEV_ADMIN' ) )
{
	print "<h1>{$lang['text_incorrect']}</h1>{$lang['text_cannot']}";
	exit();
}

require_once "include/user_functions.php";

$lang = array_merge( $lang, load_language('ad_log') ); // Reuse log language or create specific one

// Handle delete action
if (isset($_GET['delete']) && is_valid_id($_GET['delete'])) {
    $id = intval($_GET['delete']);
    @mysql_query("DELETE FROM url_shortener_logs WHERE id = $id") or sqlerr(__FILE__, __LINE__);
    header("Location: admin.php?action=url_shortener_logs");
    exit();
}

// Handle bulk delete
if (isset($_POST['delete_selected']) && isset($_POST['ids'])) {
    $ids = array_map('intval', $_POST['ids']);
    $ids_str = implode(',', $ids);
    @mysql_query("DELETE FROM url_shortener_logs WHERE id IN ($ids_str)") or sqlerr(__FILE__, __LINE__);
    header("Location: admin.php?action=url_shortener_logs");
    exit();
}

// Build query with filters
$where = array();
$query_params = array();

if (!empty($_GET['search'])) {
    $search = mysql_real_escape_string($_GET['search']);
    $where[] = "(original_url LIKE '%$search%' OR short_url LIKE '%$search%' OR ip_address LIKE '%$search%')";
}

if (!empty($_GET['status'])) {
    $status = mysql_real_escape_string($_GET['status']);
    $where[] = "status = '$status'";
}

if (!empty($_GET['user_id']) && is_valid_id($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);
    $where[] = "user_id = $user_id";
}

$where_clause = !empty($where) ? "WHERE " . implode(' AND ', $where) : "";

// Pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perpage = 50;
$offset = ($page - 1) * $perpage;

$count_res = mysql_query("SELECT COUNT(*) FROM url_shortener_logs $where_clause") or sqlerr(__FILE__, __LINE__);
$count_arr = mysql_fetch_row($count_res);
$total = $count_arr[0];
$pages = ceil($total / $perpage);

// Main query
$query = "SELECT l.*, u.username FROM url_shortener_logs l LEFT JOIN users u ON l.user_id = u.id $where_clause ORDER BY l.created_at DESC LIMIT $offset, $perpage";
$res = mysql_query($query) or sqlerr(__FILE__, __LINE__);

$HTMLOUT = '';

$HTMLOUT .= "
<div class='cblock'>
    <div class='cblock-header'>URL Shortener Logs Management</div>
    <div class='cblock-content'>

    <!-- Search and Filter Form -->
    <form method='get' action='admin.php'>
        <input type='hidden' name='action' value='url_shortener_logs' />
        <table class='main' border='1' cellspacing='0' cellpadding='5'>
            <tr>
                <td class='rowhead'>Search</td>
                <td><input type='text' name='search' value='" . (isset($_GET['search']) ? htmlsafechars($_GET['search']) : '') . "' size='50' placeholder='Search URLs, IPs...' /></td>
                <td class='rowhead'>Status</td>
                <td>
                    <select name='status'>
                        <option value=''>All</option>
                        <option value='success'" . (isset($_GET['status']) && $_GET['status'] == 'success' ? ' selected' : '') . ">Success</option>
                        <option value='failed'" . (isset($_GET['status']) && $_GET['status'] == 'failed' ? ' selected' : '') . ">Failed</option>
                    </select>
                </td>
                <td class='rowhead'>User ID</td>
                <td><input type='text' name='user_id' value='" . (isset($_GET['user_id']) ? intval($_GET['user_id']) : '') . "' size='10' /></td>
                <td><input type='submit' value='Filter' class='btn' /></td>
            </tr>
        </table>
    </form>

    <form method='post' action='admin.php?action=url_shortener_logs'>
        <div style='text-align: right; margin: 10px 0;'>
            <input type='submit' name='delete_selected' value='Delete Selected' class='btn' onclick='return confirm(\"Are you sure you want to delete selected logs?\");' />
        </div>

        <table class='main' border='1' cellspacing='0' cellpadding='5'>
            <tr>
                <td class='colhead'><input type='checkbox' id='checkall' /></td>
                <td class='colhead'>ID</td>
                <td class='colhead'>Original URL</td>
                <td class='colhead'>Short URL</td>
                <td class='colhead'>User</td>
                <td class='colhead'>IP Address</td>
                <td class='colhead'>Status</td>
                <td class='colhead'>Created</td>
                <td class='colhead'>Actions</td>
            </tr>";

if (mysql_num_rows($res) == 0) {
    $HTMLOUT .= "
            <tr>
                <td colspan='9' align='center'><b>No logs found</b></td>
            </tr>";
} else {
    while ($arr = mysql_fetch_assoc($res)) {
        $status_color = $arr['status'] == 'success' ? 'green' : 'red';
        $HTMLOUT .= "
            <tr>
                <td><input type='checkbox' name='ids[]' value='{$arr['id']}' /></td>
                <td>{$arr['id']}</td>
                <td><div style='max-width: 300px; overflow: hidden; text-overflow: ellipsis;' title='" . htmlsafechars($arr['original_url']) . "'>" . htmlsafechars(substr($arr['original_url'], 0, 50)) . "...</div></td>
                <td>" . ($arr['short_url'] ? "<a href='" . htmlsafechars($arr['short_url']) . "' target='_blank'>" . htmlsafechars($arr['short_url']) . "</a>" : 'N/A') . "</td>
                <td>" . ($arr['username'] ? "<a href='userdetails.php?id={$arr['user_id']}'>" . htmlsafechars($arr['username']) . "</a>" : ($arr['user_id'] ? $arr['user_id'] : 'N/A')) . "</td>
                <td>{$arr['ip_address']}</td>
                <td><span style='color: $status_color; font-weight: bold;'>{$arr['status']}</span></td>
                <td>" . get_date($arr['created_at'], 'LONG') . "</td>
                <td><a href='admin.php?action=url_shortener_logs&delete={$arr['id']}' onclick='return confirm(\"Delete this log?\");'>Delete</a></td>
            </tr>";
    }
}

$HTMLOUT .= "
        </table>
    </form>

    <!-- Pagination -->
    <div style='text-align: center; margin-top: 10px;'>";

if ($pages > 1) {
    $HTMLOUT .= "Pages: ";
    for ($i = 1; $i <= $pages; $i++) {
        if ($i == $page) {
            $HTMLOUT .= "<b>$i</b> ";
        } else {
            $query_string = $_GET;
            $query_string['page'] = $i;
            $url = 'admin.php?' . http_build_query($query_string);
            $HTMLOUT .= "<a href='$url'>$i</a> ";
        }
    }
}

$HTMLOUT .= "
    </div>

    <p><b>Total Records:</b> $total</p>

    </div>
</div>

<script type='text/javascript'>
// Check all checkboxes
document.getElementById('checkall').onclick = function() {
    var checkboxes = document.getElementsByName('ids[]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = this.checked;
    }
};
</script>";

print stdhead("URL Shortener Logs") . $HTMLOUT . stdfoot();

?>