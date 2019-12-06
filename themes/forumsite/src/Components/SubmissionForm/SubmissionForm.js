import React, {useState} from 'react';
import {Form, InputGroup, Button, Alert} from "react-bootstrap";
import {Formik} from "formik";
import './SubmissionForm.scss';
import {SubmissionValidation} from "./SubmissionValidation";
import {FormikFormError} from "../Partials/FormikFormError";

function SubmissionForm() {
    const initial = {Name:'', Email: '', PhoneNumber: '', Summary: ''};
    const [Error, setError] = useState(null);
    const [postMessage, setPostMessage] = useState(null);

    const handleSubmit = (values) => {
        const url = `/api/forum/submission/save/2`;
        return fetch(url, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(values, null, 2)
        }).then((res) => res.json())
            .then((result) => {
               if(result.success){

               }else{

               }
            }).catch((err) => setError(err.message()))
    };

    return (
        <React.Fragment>
            <h3>Make Your Submission</h3>
            <Formik
                initialValues={{...initial}}
                onSubmit={(values, {setSubmitting}) => {
                    handleSubmit(values)
                        .finally(() => setSubmitting(false))
                }}
                validationSchema={SubmissionValidation}
            >{({values, handleChange, onChange, errors, handleSubmit, handleBlur, touched, isSubmitting}) => (
                <Form onSubmit={handleSubmit}>
                    <Form.Label className="form-label-heading">Name</Form.Label>
                    <InputGroup>
                        <Form.Control
                            name="Name"
                            value={values.Name || ''}
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isValid={touched.Name && !errors.Name}
                            isInvalid={!!errors.Name}
                        />
                        {errors && (<FormikFormError error={errors.Name} />)}
                    </InputGroup>

                    <Form.Label className="form-label-heading">Email Address</Form.Label>
                    <InputGroup>
                        <Form.Control
                            name="Email"
                            value={values.Email || ''}
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isValid={touched.Email && !errors.Email}
                            isInvalid={!!errors.Email}
                        />
                        {errors.Email && (<FormikFormError error={errors.Email} />)}
                    </InputGroup>

                    <Form.Label className="form-label-heading">Phone Number</Form.Label>
                    <InputGroup>
                        <Form.Control
                            name="PhoneNumber"
                            value={values.PhoneNumber || ''}
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isValid={touched.PhoneNumber && !errors.PhoneNumber}
                            isInvalid={!!errors.PhoneNumber}
                        />
                        {errors.PhoneNumber && (<FormikFormError error={errors.PhoneNumber} />)}
                    </InputGroup>

                    <Form.Label className="form-label-heading">Submission Summary</Form.Label>
                    <InputGroup>
                        <Form.Control
                            as="textarea"
                            name="Summary"
                            type="textarea"
                            value={values.Summary || ''}
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isValid={touched.Summary && !errors.Summary}
                            isInvalid={!!errors.Summary}
                        />
                        {errors.Summary && (<FormikFormError error={errors.Summary} />)}
                    </InputGroup>

                    {Error && (<Alert variant="danger">{Error}</Alert>)}
                    <Button variant="primary" type="submit" className="mt-2" disabled={isSubmitting} block>
                        Submit</Button>
                </Form>
            )}
            </Formik>
        </React.Fragment>
    )
}

export {SubmissionForm}