## Purpose of Stubs folders

In this folder we put all kind of assets that we might need for our tests.  
An example of some use cases:

### Uploading of a file:
```
$parameters['file'] = new UploadedFile(
    base_path('tests/stubs/pic1.txt'),
    'pic1.txt',
    'text/txt', null, true
);
```

### Mocking a file download:
```
// Setup
$this->fileManagerMock = Mockery::mock(FileManager::class);
app()->instance(FileManager::class, $this->fileManagerMock);

// Mock
$this->fileManagerMock
     ->shouldReceive('downloadFileFromUrl')
     ->once()
     ->andReturn(base_path('tests/stubs/ae_project_transition_valid.zip'));
```