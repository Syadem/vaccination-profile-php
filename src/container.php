<?php
namespace Syadem\VaccinationProfile;

require(__DIR__ . '/entities/root.php');

class Container
{
	public static function init($baseUrl = "https://cdnnuva.mesvaccins.net")
	{
		$last = json_decode(file_get_contents($baseUrl . "/versions/last.json"), true);
		$dump = json_decode(file_get_contents($baseUrl . "/json/" . $last["dump_hash"] . ".json"));
		$vaccination_profile_root = Root::from($dump);
		return new Container($vaccination_profile_root);
	}

	private Root $vaccination_profile_root;
	private Version $version;
	private Repository $conditions;
	private Repository $conditionGroups;
	private Repository $areas;
	private Repository $documents;

	public function __construct(Root $vaccination_profile_root)
	{
		$this->vaccination_profile_root = $vaccination_profile_root;
		$this->version = $vaccination_profile_root->getVersion();
		$this->conditions = new Repository($vaccination_profile_root->getConditions());
		$this->conditionGroups = new Repository($vaccination_profile_root->getConditionGroups());
		$this->areas = new Repository($vaccination_profile_root->getAreas());
		$this->documents = new Repository($vaccination_profile_root->getDocuments());
	}

	public function getVersion()
	{
		return $this->version;
	}

	public function getConditions()
	{
		return $this->conditions;
	}

	public function getConditionGroups()
	{
		return $this->conditionGroups;
	}

	public function getAreas()
	{
		return $this->areas;
	}

	public function getDocuments()
	{
		return $this->documents;
	}
}
