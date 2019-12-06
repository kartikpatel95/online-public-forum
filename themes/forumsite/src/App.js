import React, {useEffect, useState, useCallback} from 'react';
import {SubmissionForm} from "./Components/SubmissionForm/SubmissionForm";

function App(props) {
	const [forumPageInfo, setForumPageInfo] = useState({});
	const [Error, setError] = useState(null);

	const fetchForumPageInfo = useCallback(() => {
		const url = '/api/forum/submission/get';
		fetch(url).then((res) => res.json())
			.then((result) => {
				if(result.success){
					setForumPageInfo(result.data);
				}else{
					setError(result.message);
				}
			})
	}, []);

	useEffect(() => {
		fetchForumPageInfo()
	}, [fetchForumPageInfo]);

	return (
		<SubmissionForm />
	);
}
export default App;