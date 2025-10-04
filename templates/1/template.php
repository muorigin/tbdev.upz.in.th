<?php
/*
+------------------------------------------------
|   TBDev.net BitTorrent Tracker PHP
|   =============================================
|   by CoLdFuSiOn
|   (c) 2003 - 2011 TBDev.Net
|   http://www.tbdev.net
|   =============================================
|   svn: http://sourceforge.net/projects/tbdevnet/
|   Licence Info: GPL
+------------------------------------------------
|   $Date$
|   $Revision$
|   Author: CoLdFuSiOn, Dorksville, AronTh
|   Theme Designed by : Dorksville
|   $URL$
+------------------------------------------------
*/

function stdhead( $title = "", $js='', $css='' ) {
    global $CURUSER, $TBDEV, $lang, $msgalert;

    if (!$TBDEV['site_online'])
      die("Site is down for maintenance, please check back again later... thanks<br />");

    if ($title == "")
        $title = $TBDEV['site_name'] .(isset($_GET['tbv'])?" (".TBVERSION.")":'');
    else
        $title = $TBDEV['site_name'].(isset($_GET['tbv'])?" (".TBVERSION.")":''). " :: " . htmlsafechars($title);

    if ($CURUSER)
    {
      $res1 = @mysql_query("SELECT COUNT(*) FROM messages WHERE receiver={$CURUSER["id"]} AND unread='yes' AND location = 1") or sqlerr(__LINE__,__FILE__);
      $arr1 = mysql_fetch_row($res1);

      $unread = ($arr1[0] > 0 ? "<span class='badge bg-danger'>{$arr1[0]}</span>" : "");
      $msgalert = $arr1[0];
      $inbox = $unread ? $unread : "0";
    }

	$FILE = isset($CURUSER) ? $CURUSER['stylesheet'] : $TBDEV['stylesheet'] ;

    $htmlout = "<!DOCTYPE html>
		<html lang='en'>
		<head>
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<meta name='generator' content='TBDev.net' />

      <title>{$title}</title>

      <!-- Google Font for Thai -->
      <link href='https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap' rel='stylesheet'>

      <!-- Bootstrap 5 CSS -->
      <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>

      <!-- Custom CSS -->
      <link rel='stylesheet' type='text/css' href='{$TBDEV['baseurl']}/templates/$FILE/{$FILE}.css' />
      {$css}

      <!-- jQuery and Bootstrap JS -->
      <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
      <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
      {$js}

      <script type='text/javascript'>
        $(document).ready(function(){
          $('#ff').click(function (event) {
            event.preventDefault();
            $('#fastsearch').slideToggle('fast');
          });
        });
      </script>

      <style>
        body { font-family: 'Noto Sans Thai', sans-serif; }
      </style>

    </head>

    <body>

    <!-- Navbar -->
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class='container'>
        <a class='navbar-brand' href='index.php'>{$TBDEV['site_name']}</a>

        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>

        <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav me-auto'>";

    $tab = pathinfo( $_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME );

    if ($CURUSER)
    {
      $tabarray = array(
				'index'   => "<li class='nav-item'><a class='nav-link' href='index.php'>{$lang['gl_home']}</a></li>",
				'browse'  => "<li class='nav-item'><a class='nav-link' href='browse.php'>{$lang['gl_browse']}</a></li>",
				'upload'  => "<li class='nav-item'><a class='nav-link' href='upload.php'>{$lang['gl_upload']}</a></li>",
				'chat'    => "<li class='nav-item'><a class='nav-link' href='chat.php'>{$lang['gl_chat']}</a></li>",
				'forums'  => "<li class='nav-item'><a class='nav-link' href='forums.php'>{$lang['gl_forums']}</a></li>",
				'topten'  => "<li class='nav-item'><a class='nav-link' href='topten.php'>{$lang['gl_top_10']}</a></li>",
				'links'   => "<li class='nav-item'><a class='nav-link' href='links.php'>{$lang['gl_links']}</a></li>",
				'faq'     => "<li class='nav-item'><a class='nav-link' href='faq.php'>{$lang['gl_faq']}</a></li>",
				'staff'   => "<li class='nav-item'><a class='nav-link' href='staff.php'>{$lang['gl_staff']}</a></li>"
			);

      if( $CURUSER['class'] >= UC_MODERATOR )
      {
        $tabarray['admin']= "<li class='nav-item'><a class='nav-link' href='admin.php'>{$lang['gl_admin']}</a></li>";
      }

      foreach($tabarray as $k => $v)
			{
        if( $tab == $k )
          $htmlout .= str_replace("nav-link", "nav-link active", $v);
        else
          $htmlout .= $v;
			}

      unset($tabarray);
    }
    else
    {
      $tabarray = array(
       'login'    => "<li class='nav-item'><a class='nav-link' href='members.php?action=login'>{$lang['gl_login']}</a></li>",
       'signup'   => "<li class='nav-item'><a class='nav-link' href='members.php?action=reg'>{$lang['gl_signup']}</a></li>",
       'recover'  => "<li class='nav-item'><a class='nav-link' href='members.php?action=recover'>{$lang['gl_recover']}</a></li>"
       );

      foreach($tabarray as $k => $v)
			{
        if( $tab == $k )
          $htmlout .= str_replace("nav-link", "nav-link active", $v);
        else
          $htmlout .= $v;
			}
			unset($tabarray);
    }

    $htmlout .= "
          </ul>

          <ul class='navbar-nav'>
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='languageDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Language
              </a>
              <ul class='dropdown-menu' aria-labelledby='languageDropdown'>
                <li><a class='dropdown-item' href='?lang=en'>English</a></li>
                <li><a class='dropdown-item' href='?lang=th'>ไทย</a></li>
              </ul>
            </li>
            <li class='nav-item'>
              <a class='nav-link' id='ff' href='search.php'>{$lang['gl_search']}</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Status Bar -->
    <div class='bg-light py-2'>
      <div class='container'>
        <div class='row'>
          <div class='col-md-8'>";
    $htmlout .= StatusBar();
    $htmlout .= "
          </div>
          <div class='col-md-4 text-end'>";

    if ($CURUSER)
    {
      if (!empty($CURUSER['avatar']))
      {
        $avatar = "<img src='{$CURUSER['avatar']}' class='rounded-circle' width='50' height='50' alt='' />";
      }
      else
      {
        $avatar = "<img src='{$TBDEV['baseurl']}/templates/1/images/default_thumb.png' class='rounded-circle' width='50' height='50' alt='' />";
      }

      $htmlout .= "
            <div class='d-flex align-items-center justify-content-end'>
              <a href='userdetails.php?id={$CURUSER['id']}' class='me-2'>{$avatar}</a>
              <div>
                <a href='userdetails.php?id={$CURUSER['id']}' class='text-decoration-none'>{$CURUSER['username']}</a><br>
                <a href='messages.php' class='text-decoration-none'>Messages {$inbox}</a><br>
                <a href='members.php?action=logout' class='text-decoration-none'>{$lang['gl_logout']}</a>
              </div>
            </div>";
    }
    else
    {
      $htmlout .= "
            <a href='members.php?action=login' class='btn btn-primary me-2'>Sign In</a>
            <a href='members.php?action=reg' class='btn btn-secondary'>Register</a>";
    }

    $htmlout .= "
          </div>
        </div>
      </div>
    </div>

    <!-- Main Container -->
    <div class='container my-4'>";

            if ( $TBDEV['msg_alert'] && $msgalert )
            {
             $htmlout .= "
      <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <a href='messages.php'>".sprintf($lang['gl_msg_alert'], $msgalert) ."&nbsp;". ($msgalert > 1 ? $lang['gl_msg_plural'] : $lang['gl_msg_singular']) . "!</a>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
}

    return $htmlout;

} // stdhead

function stdfoot() {
  global $TBDEV, $lang;

    $htmlout = "
    </div>
    <!-- End Main Container -->

    <!-- Footer -->
    <footer class='bg-dark text-light py-4 mt-5'>
      <div class='container'>
        <div class='row'>
          <div class='col-md-6'>
            <p>{$lang['gl_copyright']}<br />
            <a href='http://www.tbdev.net'><img src='{$TBDEV['pic_base_url']}tbdev_btn_red.png' alt='Powered By TBDev &copy;2010' title='Powered By TBDev &copy;2010' /></a>
            <a href='http://www.tbdev.net'><img src='{$TBDEV['pic_base_url']}dorks_btn_red.png' alt='Dorksville &copy;2010' title='Dorksville &copy;2010' /></a>
            </p>
          </div>
          <div class='col-md-6 text-end'>
            <p>Built with Bootstrap 5</p>
          </div>
        </div>
      </div>
    </footer>

    </body>
    </html>";

    return $htmlout;
}

function stdmsg($heading, $text)
{
    $htmlout = "<div class='alert alert-info'>
    <h4>$heading</h4>
    <p>$text</p>
    </div>";

    return $htmlout;
}

function StatusBar() {

	global $CURUSER, $TBDEV, $lang, $msgalert;

	if (!$CURUSER)
		return "&nbsp;";


	$upped = mksize($CURUSER['uploaded']);

	$downed = mksize($CURUSER['downloaded']);

	$ratio = $CURUSER['downloaded'] > 0 ? $CURUSER['uploaded']/$CURUSER['downloaded'] : 0;

	$ratio = number_format($ratio, 2);

	$IsDonor = '';
	if ($CURUSER['donor'] == "yes")

	$IsDonor = "<img src='{$TBDEV['pic_base_url']}star.gif' alt='donor' title='donor' />";


	$warn = '';
	if ($CURUSER['warned'] == "yes")

	$warn = "<img src='{$TBDEV['pic_base_url']}warned.gif' alt='warned' title='warned' />";

	$res2 = @mysql_query("SELECT seeder, COUNT(*) AS pCount FROM peers WHERE userid=".$CURUSER['id']." GROUP BY seeder") or sqlerr(__LINE__,__FILE__);

	$seedleech = array('yes' => '0', 'no' => '0');

	while( $row = mysql_fetch_assoc($res2) ) {
		if($row['seeder'] == 'yes')
			$seedleech['yes'] = $row['pCount'];
		else
			$seedleech['no'] = $row['pCount'];

	}

/////////////// REP SYSTEM /////////////
	$CURUSER['reputation'] = 49;

	$member_reputation = get_reputation($CURUSER, 1);
///////////// REP SYSTEM END //////////

	$StatusBar = '';

		$StatusBar .= "
            <div>
                $IsDonor$warn&nbsp;
                $member_reputation, {$lang['gl_ratio']}:&nbsp;$ratio &nbsp;&nbsp;{$lang['gl_uploaded']}:&nbsp;$upped
		        &nbsp;&nbsp;{$lang['gl_downloaded']}:&nbsp;$downed
                &nbsp;&nbsp;{$lang['gl_act_torrents']}:&nbsp;<img alt='{$lang['gl_seed_torrents']}' title='{$lang['gl_seed_torrents']}' src='{$TBDEV['pic_base_url']}arrowup.gif' />&nbsp;{$seedleech['yes']}
                &nbsp;&nbsp;<img alt='{$lang['gl_leech_torrents']}' title='{$lang['gl_leech_torrents']}' src='{$TBDEV['pic_base_url']}arrowdown.gif' />&nbsp;{$seedleech['no']}
            </div>
                <p class='mb-0'>".get_date(TIME_NOW, 'LONG', 1)."</p>";

	return $StatusBar;

}

?>