import React from 'react';
import {Form} from 'react-bootstrap';

export function FormikFormError(props) {
    const {error} = props;
    return (
        <Form.Control.Feedback type="invalid">{error}</Form.Control.Feedback>
    )
}