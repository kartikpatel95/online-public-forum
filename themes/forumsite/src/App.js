import React from 'react';
import {SubmissionForm} from "./Components/SubmissionForm/SubmissionForm";

function App() {
	const forumPageID = document.getElementById('submission-form').dataset.page;
	return (
		<SubmissionForm page={forumPageID}/>
	);
}
export default App;