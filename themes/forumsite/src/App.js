import React, {useState, useEffect, useCallback} from 'react';
import {SubmissionForm} from "./Components/SubmissionForm/SubmissionForm";
import {Alert} from "react-bootstrap";

function App() {
	const [Error, setError] = useState(null);
	const [PageInfo, setPageInfo] = useState({});
	const forumPageID = document.getElementById('submission-form').dataset.page;

	const fetchPageInfo = useCallback(() =>{
		if(forumPageID){
			const url = `/api/forum/submission/get/${forumPageID}`;
			fetch(url).then((res) => res.json())
				.then((result) => {
					if (result.success){
						setPageInfo(result.data);
					} else {
						setError(result.message);
					}
				}).catch((err) => setError(err.message))
		}
	}, [forumPageID]);

	useEffect(() => {
		fetchPageInfo();
	}, [fetchPageInfo]);

	if(Error){
		return (<Alert variant="danger">{Error}</Alert>)
	}else {
		return (
			<SubmissionForm page={forumPageID} info={PageInfo}/>
		);
	}
}
export default App;