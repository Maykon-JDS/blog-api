The terms **URL (Uniform Resource Locator)** and **URI (Uniform Resource Identifier)** are often used interchangeably, but they have distinct meanings in the context of web technologies. Here's how they differ:

### **URI (Uniform Resource Identifier)**
- **Definition**: A URI is a generic identifier that identifies a resource either by location, name, or both.
- **Components**: A URI can have various forms, such as a URL or a URN (Uniform Resource Name).
  - For example, `https://example.com` (a URL) and `urn:isbn:0451450523` (a URN for a book) are both URIs.
- **Purpose**: A URI identifies *what* a resource is, either by its name, location, or both.
- **Structure**: A URI can have the following components:
  - **Scheme** (e.g., `https`, `ftp`)
  - **Authority** (e.g., `example.com`)
  - **Path** (e.g., `/path/to/resource`)
  - **Query** (e.g., `?key=value`)
  - **Fragment** (e.g., `#section`)

### **URL (Uniform Resource Locator)**
- **Definition**: A URL is a subset of a URI that specifically includes the means to locate the resource by describing its primary access mechanism (such as its network location).
- **Components**: A URL always contains:
  - **Protocol/Scheme** (e.g., `https`, `ftp`) to define the access method.
  - **Address** (e.g., `example.com` or `192.168.1.1`) to locate the resource.
- **Purpose**: A URL tells you *where* a resource is located and how to retrieve it.
- **Example**: `https://example.com/page` is a URL because it includes a scheme (`https`) and a resource location (`example.com/page`).

### **Key Differences**
| **Aspect**         | **URI**                                      | **URL**                                      |
|---------------------|----------------------------------------------|----------------------------------------------|
| **Scope**          | Broader (includes URLs and URNs)             | Narrower (a subset of URIs)                  |
| **Focus**          | Identifies a resource by name, location, or both | Focuses on the location and access mechanism of a resource |
| **Examples**       | `https://example.com`, `urn:isbn:0451450523` | `https://example.com/resource`              |
| **Components**     | May or may not include location details      | Always includes location and access method  |

### **In Practice**
- Most URIs used on the web are URLs because they provide both the resource's location and access method.
- All URLs are URIs, but not all URIs are URLs.V

---

Here are some examples of **URIs**, demonstrating both URLs and URNs as subsets of URIs:

### **1. URL Examples (a subset of URI)**
These URIs specify the location and access method (hence, they are URLs):
- `https://example.com/path/to/page`
- `ftp://ftp.example.com/file.txt`
- `mailto:someone@example.com`

### **2. URN Examples (another subset of URI)**
These URIs identify a resource by name, without specifying its location:
- `urn:isbn:0451450523` (an ISBN number for a book)
- `urn:uuid:123e4567-e89b-12d3-a456-426614174000` (a unique identifier for a resource)
- `urn:ietf:rfc:2141` (a reference to RFC 2141)

### **3. Generic URI Examples**
These are URIs that may or may not fit into the URL or URN category:
- `file:///C:/Users/Example/Documents/file.txt` (a local file path)
- `tel:+123456789` (telephone number scheme)
- `data:text/plain;base64,SGVsbG8sIFdvcmxkIQ==` (embedded data using the `data` scheme)

In summary:
- **URI** is a broad term for identifying resources.
- **URL** includes location details (e.g., web links).
- **URN** uses a persistent naming scheme without indicating location.