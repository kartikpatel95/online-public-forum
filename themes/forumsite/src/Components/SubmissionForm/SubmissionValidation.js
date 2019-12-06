import * as Yup from 'yup';

export const SubmissionValidation = () => {
    return (
        Yup.object().shape({
            Name: Yup.string().required('Name is required!'),
            Email: Yup.string().email('Please enter a valid email address').required('Email address is required!'),
            PhoneNumber: Yup.string().required('Please enter a phone number'),
            Summary: Yup.string().trim().required('Please enter a summary')
        })
    )
};