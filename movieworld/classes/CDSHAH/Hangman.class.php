<?php

namespace CDSHAH
{
	class Hangman
	{
		/**
		 * Class instance
		 * 
		 * @var object $_instance
		 */
		private static $_instance;
		/**
		 * Guesses
		 * 
		 * @var array $guesses
		 */
		public $guesses = array();
		/**
		 * Constructor
		 * 
		 * @param array $words A selection of words to choose from.
		 * @param int $fails The max number of failed attempts.
		 */
		private function __construct(Array $words, $fails)
		{
			$this->_pickWord($words);
			$this->fails = $fails;
		}
		/**
		 * Get instance
		 * Used to get an instance of the Hangman object.
		 * 
		 * @param array $words A selection of words to play the game with.
		 * 
		 * @return object An instance of the Hangman object.
		 */
		public static function getInstance(Array $words, $fails)
		{
			session_start();
			// if object exists in session then return it.
			if(isset($_SESSION['hangman']) === true)
				return unserialize($_SESSION['hangman']);

			if(!self::$_instance)
			{
				self::$_instance = new Hangman($words, $fails);
			}
			return self::$_instance;
		}
		/**
		 * Run
		 * Runs the game.
		 */
		public function run()
		{
			if($_SERVER['REQUEST_METHOD'] == "POST" AND $_POST['guess'] !== '')
			{
				$this->secret = $this->_checkGuess($_POST['guess']);
				switch($this->_state)
				{
					case 'winner':
						$this->message = "You are a winner! Well done. <a href=\"\">Play again?</a>";
						self::reset();
						return;
						break;
					case 'good':
						$this->message = "Good guess, try another!";
						$this->message .= " Failed attempts left: ". $this->fails;
						return;
					case 'hanging':
						$this->message = "Uh oh! Game over, man. Game over! <a href=\"\">Play again?</a>";
						self::reset();
						return;
						break;
					case '':
					default:
						$this->message = "Bad luck. Try another letter.";
						$this->message .= " Failed attempts left: ". $this->fails;
						return;
						break;
				}
			}
			$this->message = "Guess the word.";
		}
		/**
		 * Pick word
		 * Picks the word to play the game with.
		 * 
		 * @param array $words A selection of words to pick from.
		 * 
		 * @return void
		 */
		private function _pickWord(Array $words)
		{
			$random_word = array_rand($words, 1);
			$this->_word = $words[$random_word];
			$this->secret = preg_replace('/[A-Za-z]/i', '_ ', $this->_word);
		}
		/**
		 * Check guess
		 * Checks if the guessed letter exists in the word.
		 * 
		 * @param string $letter the guessed letter
		 * 
		 * @return string the secret with the guessed letters filled in else return the original secret.
		 */
		private function _checkGuess($letter)
		{
			// add letter to guesses
			$this->guesses[] = $letter;

			// reconstruct secret with guesses
			$guesses = implode('', $this->guesses);
			if(stristr($this->_word, $letter))
			{
				$expression = "/[^{$guesses}]/i";
				$secret     = preg_replace($expression, '_ ', $this->_word);
				$this->_state = 'good';
				if(!strstr($secret, '_'))
					$this->_state = 'winner';
				return $secret;
			}
			$this->fails--;
			if($this->fails == 0)
				$this->_state = 'hanging';
			return $this->secret;
		}
		private static function reset()
		{
			session_destroy();
		}
		/**
		 * Set
		 * Sets undeclared property
		 */
		public function __set($key, $value)
		{
			$this->$key = $value;
		}
		/**
		 * Get
		 * Gets undeclared property
		 */
		public function __get($key)
		{
			if(isset($this->$key) === TRUE)
				return $this->$key;
		}
		/**
		 * Destruct
		 * Save object to session variable
		 */
		public function __destruct()
		{
			$_SESSION['hangman'] = serialize($this);
		}
	}
}