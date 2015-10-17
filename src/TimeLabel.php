<?php namespace Sukohi\TimeLabel;

use Carbon\Carbon;

class TimeLabel {

	private $_types = [];
	private $_time_labels = [];

	public function setLabel($types) {

		$this->_types = $types;
		return $this;

	}

	public function isFirst($dt) {

		$label = $this->get($dt, false);
		return (!in_array($label, $this->_time_labels));

	}

	public function get($dt, $add_type_flag = true) {

		$time_label = '';
		$year_month = $dt->format('Y-n');

		if($dt->isToday()) {

			$time_label = $this->_types['today'];

		} else if($dt->isYesterday()) {

			$time_label = $this->_types['yesterday'];

		} else if($year_month == date('Y-n')){

			$time_label = $this->_types['this_month'];

		} else if($year_month == with(new Carbon())->subMonth()->format('Y-n')){

			$time_label = $this->_types['last_month'];

		} else {

			$time_label = $dt->format($this->_types['other']);

		}

		if($add_type_flag && !in_array($time_label, $this->_time_labels)) {

			$this->_time_labels[] = $time_label;

		}

		return $time_label;

	}

}