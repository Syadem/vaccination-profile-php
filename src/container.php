<?php
namespace Syadem\VaccinationProfile;

require(__DIR__ . '/entities/root.php');

class Container {
    public static function init($baseUrl = "https://cdnnuva.mesvaccins.net") {
        $last = json_decode(file_get_contents($baseUrl."/versions/last.json"), true);
        $dump = json_decode(file_get_contents($baseUrl."/json/".$last["dump_hash"].".json"));
        $vaccination_profile_root = Root::from($dump);
        return new Container($vaccination_profile_root);
    }

		private $vaccination_profile_root;
		public $repositories;
		public $version;

		public function __construct($vaccination_profile_root) {
			$this->vaccination_profile_root = $vaccination_profile_root;
			$this->version = $vaccination_profile_root->version;
			$this->repositories = new \StdClass();
			$this->repositories->conditions = new Repository($vaccination_profile_root->conditions);
			$this->repositories->conditionGroups = new Repository($vaccination_profile_root->conditionGroups);
			$this->repositories->areas = new Repository($vaccination_profile_root->areas);
			$this->repositories->documents = new Repository($vaccination_profile_root->documents);
		}
}
