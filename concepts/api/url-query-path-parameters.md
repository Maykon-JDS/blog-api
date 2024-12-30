# URL, Query & Path Parameters

When designing APIs, an integral part involves dealing with **Uniform Resource Locators (URLs)**, **query parameters**, and **path parameters**. These components play crucial roles in how the API sends and retrieves data.

## **URL**
The URL forms the basis of the API, as it identifies the resource on the server.

## **Query Parameters**
Query parameters are used to:
- Filter specific results.
- Sort data.
- Show specific data fields.

They are appended to the URL as key-value pairs, typically after a `?`. Multiple query parameters are separated by `&`.

## **Path Parameters**
Path parameters serve as placeholders for variable data that is inserted into the URL. This allows for customization of the data response.

### Example:
```plaintext
https://api.example.com/users/{userId}
```
