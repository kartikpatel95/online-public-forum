import React, {useState} from 'react';
import {Form, InputGroup, Button, Alert} from "react-bootstrap";
import {Formik} from "formik";
import './SubmissionForm.scss';
import {SubmissionValidation} from "./SubmissionValidation";
import {FormikFormError} from "../Partials/FormikFormError";
import moment from 'moment';

function SubmissionForm(props) {
    const initial = {Name:'', Email: '', PhoneNumber: '', Summary: ''};
    const [Error, setError] = useState(null);
    const [postMessage, setPostMessage] = useState(null);
    const {page, info} = props;
    const url = page ? `/api/forum/submission/save/${page}` : '';

    const submissionOpen = info && moment(info.CloseDate).unix() >  moment().unix();

    const handleSubmit = (values) => {
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
                    setPostMessage(result.message);
               }else{
                   setError(result.message);
               }
            }).catch((err) => setError(err.message()))
    };
    return (
        <div className="submission-form">
            <h3 className="form-content-heading">
                {submissionOpen ? 'Make Your Submission' : 'Submissions are closed'}
            </h3>
            <Formik
                initialValues={{...initial}}
                onSubmit={(values, {setSubmitting, resetForm}) => {
                    handleSubmit(values)
                        .finally(() => {
                            resetForm({...initial});
                            setSubmitting(false);
                        })
                }}
                validationSchema={SubmissionValidation}
            >{({values, handleChange, onChange, errors, handleSubmit, handleBlur, touched, isSubmitting}) => (
                <Form onSubmit={handleSubmit}>
                    <Form.Label className="form-label-heading" column={false}>Name</Form.Label>
                    <InputGroup>
                        <Form.Control
                            name="Name"
                            value={values.Name || ''}
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isValid={touched.Name && !errors.Name}
                            isInvalid={!!errors.Name}
                            disabled={!submissionOpen}
                            className={submissionOpen ? 'submission-open' : 'submission-close'}
                        />
                        {errors && (<FormikFormError error={errors.Name} />)}
                    </InputGroup>

                    <Form.Label className="form-label-heading" column={false}>Email Address</Form.Label>
                    <InputGroup>
                        <Form.Control
                            name="Email"
                            value={values.Email || ''}
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isValid={touched.Email && !errors.Email}
                            isInvalid={!!errors.Email}
                            disabled={!submissionOpen}
                            className={submissionOpen ? 'submission-open' : 'submission-close'}
                        />
                        {errors.Email && (<FormikFormError error={errors.Email} />)}
                    </InputGroup>

                    <Form.Label className="form-label-heading" column={false}>Phone Number</Form.Label>
                    <InputGroup>
                        <Form.Control
                            name="PhoneNumber"
                            value={values.PhoneNumber || ''}
                            onChange={handleChange}
                            onBlur={handleBlur}
                            isValid={touched.PhoneNumber && !errors.PhoneNumber}
                            isInvalid={!!errors.PhoneNumber}
                            disabled={!submissionOpen}
                            className={submissionOpen ? 'submission-open' : 'submission-close'}
                        />
                        {errors.PhoneNumber && (<FormikFormError error={errors.PhoneNumber} />)}
                    </InputGroup>

                    <Form.Label className="form-label-heading" column={false}>Submission Summary</Form.Label>
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
                            disabled={!submissionOpen}
                            className={submissionOpen ? 'submission-open summary-text-area' : 'submission-close summary-text-area'}
                        />
                        {errors.Summary && (<FormikFormError error={errors.Summary} />)}
                    </InputGroup>

                    {postMessage && (<Alert variant="success" className="mt-2">{postMessage}</Alert>)}
                    {Error && (<Alert variant="danger">{Error}</Alert>)}

                    <Button variant="primary" type="submit" className="mt-2" disabled={!submissionOpen || isSubmitting} block>
                        Submit</Button>
                </Form>
            )}
            </Formik>
        </div>
    )
}

export {SubmissionForm}