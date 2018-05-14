import { TestBed, inject } from '@angular/core/testing';

import { UserAccessService } from './useraccess.service';

describe('UseraccessService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [UserAccessService]
    });
  });

  it('should be created', inject([UserAccessService], (service: UserAccessService) => {
    expect(service).toBeTruthy();
  }));
});
