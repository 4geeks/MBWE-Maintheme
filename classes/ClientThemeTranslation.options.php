<?php

class ClientThemeTranslationOptions{

	function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

	}

	public function registerTranslations()
	{
		if(function_exists('pll_register_string'))
		{
			//pll_register_string( '', '' );

			pll_register_string( 'Phone Label', 'Phone' );
			pll_register_string( 'Address Label', 'Address' );
			pll_register_string( 'Get Location Label', 'Get Location' );
			pll_register_string( 'FAQ Widget Title', 'Do you have any other questions?' );
			pll_register_string( 'FAQ Widget Phone Title', 'Call us for free number:' );
			pll_register_string( 'FAQ Widget Phone Email', 'Or send us an email:' );
			pll_register_string( 'Empty FAQ Msg', 'There are no FAQ' );
			pll_register_string( 'Newsletter Label', 'Newsletter' );
			
			//Button lables
			pll_register_string( 'Apply now label', 'Apply Now' );
			pll_register_string( 'Read more label', 'Read more' );
			pll_register_string( 'Signup label', 'Signup' );
			pll_register_string( 'Learn more label', 'Learn more' );

			pll_register_string( 'Course Location Label', 'Location' );
			pll_register_string( 'Course Description Label', 'Course Description' );
			pll_register_string( 'Signup now label', 'Sign Up Now!' );
			pll_register_string( 'Empty Course duration', 'Duration not yet defined.' );
			pll_register_string( 'Weeks Label', 'Weeks' );
			pll_register_string( 'No curses label', 'There are no curses.' );
			
			//About us strings
			pll_register_string( 'Background founded label', 'Founded' );
			pll_register_string( 'Background courses label', 'Courses' );
			pll_register_string( 'Background graduates label', 'Graduates' );
			pll_register_string( 'Background tagline label', 'Our background in numbers' );
			pll_register_string( 'Partners headline', 'We work only with the bests' );
			pll_register_string( 'Partners subheadline', 'Some of our partners' );
			pll_register_string( 'Newsletter subheadline', 'Subscribe to get updates right in your inbox' );
			pll_register_string( 'Newsletter trust note', 'We are working to make things better. Want to keep up to date with all our news and information? Enter your email to add into our mailing list. We hate spaming.' );
			
			//Course general strings 
			pll_register_string( 'Syllabus Label', 'Syllabus' );
			pll_register_string( 'In-class Label', 'Learn in companion of Sr. Instructors, work in teams with other students, 99% project oriented.' );
			pll_register_string( 'Online-class Label', 'Learn through practice: Flexible lessons using our online platform.' );

			//Course pricing strings
			pll_register_string( 'Pricing Section Title', 'Pricing' );
			pll_register_string( 'Pricing cash option', 'Pay Upfront' );
			pll_register_string( 'Pricing save label', 'Save' );
			pll_register_string( 'Pricing deposit label', 'Deposit' );
			pll_register_string( 'Pricing saving subject', 'in tuition' );
			pll_register_string( 'Pricing saving string', 'Pay upfront and save' );
			pll_register_string( 'Deposit explanation', 'Required to have immediate access to the first phase of the course' );
			pll_register_string( 'Pricing monthly label', 'Pay Monthly' );
			pll_register_string( 'Pricing month label', 'Months' );
			pll_register_string( 'Pricing split tuition label', 'For this course, we offer the posibility to pay the tuition splited in' );
			pll_register_string( 'Pricing monthly payments label', 'monthly payments' );

			//Pave financing
			pll_register_string( 'Pave financed lable', 'Financed' );
			pll_register_string( 'Pave financing months', 'Up to 36 months' );
			pll_register_string( 'Pave description', 'Within a couple of clicks, get approved with Pave, our financing partner. Pave offers 2 or 3 years loans (ranging from).' );
			pll_register_string( 'Pave Apply Label', 'Apply to Pave' );
		}
	}
}

?>