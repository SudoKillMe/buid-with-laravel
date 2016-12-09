function parse (str) {
	return str
		.replace(/&lt;/g, '<')
		.replace(/&gt;/g, '>');
}