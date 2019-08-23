<?php

  //response generation function

  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "Please supply all information.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Thanks! Your message has been sent.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

?>

<?php get_header(); ?>
<?php echo $response; ?>


    <div id="primary" class="site-content">

    <div id="landing" class='custom-background'>
        <h2><?php bloginfo('name')?></h2>
        <p><?php bloginfo('description')?></p>
        <a>Contact Us</a>
        <div id='jag'></div>
    </div>

    <div class="container">

        <div id="content" role="main">
            <?php
                $args = array("post_type" => "page", "order" => "ASC", "orderby" => "menu_order");
                $the_query = new WP_Query($args);
            ?>

            <?php if(have_posts()):while($the_query->have_posts()):$the_query->the_post(); ?>
            <?php get_template_part("content", "page"); ?>


            <article id='<?php echo $post->post_name; ?>' class='page-post'/>
                <h1><?php the_title() ?></h1>
                <p><?php the_content() ?></p>
            </article>

            <?php endwhile; endif; ?>

            <div id="contact" class="page">
                <form action="" method="post">
                    <div id='email-name' class='flex-row'>
                        <p><label for="name">Name: <span>*</span> <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
                        <p><label for="message_email">Email: <span>*</span> <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
                    </div>
                    <p id='message-text-area'><label for="message_text">Message: <span>*</span> <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
                    <div class='flex-row'>
                        <p><label for="message_human">Human Verification: <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
                        <div>
                            <input type="hidden" name="submitted" value="1">
                            <p><button type="submit">Submit<button</p>
                        </div>
                    </div>
                </form>
            </div>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
