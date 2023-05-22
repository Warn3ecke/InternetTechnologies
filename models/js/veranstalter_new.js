$("#form_Veranstalter").validate({
rules: {
	id: {
	},
	c_ts: {
		string: true
	},
	m_ts: {
		string: true
	},
	identifier: {
		string: true,
		maxlength: 50
	},
	Verein: {
		string: true,
		maxlength: 50
	},
	Ansprechperson: {
	},
	_User_uid: {
		string: true
	},
	Ansprechperson_Vorname: {
		string: true,
		maxlength: 50
	},
	Ansprechperson_Nachname: {
		string: true,
		maxlength: 50
	},
	Ansprechperson_Telefonnummer: {
		string: true,
		maxlength: 50
	},
	Ansprechperson_Email: {
		string: true,
		maxlength: 50
	},
	_User_uid_identifier: {
		string: true,
		maxlength: 50
	}
}
});
