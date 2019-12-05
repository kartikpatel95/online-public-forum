import React from 'react';
import {Form, InputGroup, Button} from "react-bootstrap";
import {Formik} from "formik";
import './SubmissionForm.scss';
import {SubmissionValidation} from "./SubmissionValidation";
import {FormikFormError} from "../Partials/FormikFormError";

function SubmissionForm() {
    const initial = {Name:'', Email: '', PhoneNumber: '', Summary: ''};

    return (
        <React.Fragment>
            <h3>Make Your Submission</h3>
            <Formik
                initialValues={{...initial}}
                validationSchema={SubmissionValidation}
            >{({values, handleChange, onChange, errors, handleSubmit, handleBlur, touched, isSubmitting}) => (
                <Form>
                    <Form.Label className="form-label-heading">Name</Form.Label>
                    <InputGroup>
                        <Form.Control
                            name="Name"
                        />
                        {/*<FormikFormError error={errors.Name} />*/}
                    </InputGroup>

                    <Form.Label className="form-label-heading">Email Address</Form.Label>
                    <InputGroup>
                        <Form.Control
                            name="Email"
                        />
                    </InputGroup>

                    <Form.Label className="form-label-heading">Phone Number</Form.Label>
                    <InputGroup>
                        <Form.Control
                            name="PhoneNumber"
                        />
                    </InputGroup>

                    <Form.Label className="form-label-heading">Submission Summary</Form.Label>
                    <InputGroup>
                        <Form.Control
                            as="textarea"
                            name="Summary"
                            type="textarea"
                        />
                    </InputGroup>

                    <Button variant="primary" className="mt-2" type="submit" disabled={isSubmitting} block>Submit</Button>
                </Form>
            )}
            </Formik>
        </React.Fragment>
    )
}

export {SubmissionForm}