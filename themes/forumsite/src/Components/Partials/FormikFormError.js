import React from 'react';
import {Form} from 'react-bootstrap';

export function FormikFormError(props) {
    const {error} = props;
    return (
        <Form.Control.FeedBack type="invalid">
            {error}</Form.Control.FeedBack>
    )
}