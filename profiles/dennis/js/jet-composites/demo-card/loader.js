define(['ojs/ojcore', 'text!./view.html', './viewModel', 'text!./component.json', 'css!./styles', 'ojs/ojcomposite'],
  function(oj, view, viewModel, metadata) {
    oj.Composite.register('demo-card', {
      view: view, 
      viewModel: viewModel, 
      metadata: JSON.parse(metadata)
    });
  }
);